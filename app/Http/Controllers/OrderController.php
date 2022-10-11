<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::orderBy('id', 'desc')->get();
        return view('admin.orders', $data);
    }

    public function user_index()
    {
        $data['orders'] = Order::orderBy('id', 'desc')
            ->where('user_id', Auth::id())
            ->get();
        return view('orders.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = cart::where('user_id', '=', Auth::id())->first();

        if ($cart->total != 0) {
            $data['products'] = $cart->products()->get();
            $data['services'] = $cart->services()->get();
            $data['cart'] = $cart;
            return view('orders.create', $data);
        }
        return redirect()->route('cart.user_index')
            ->with('status', 'Cart is empty!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => ['required', 'string', 'max:200'],
            'receiver_name' => ['required', 'string', 'max:20'],
            'number' => ['required', 'numeric', 'min:10'],
            'email' => ['required', 'email'],
            'country' => ['required', 'string', 'max:50'],
        ]);

        $cart = cart::where('user_id', '=', Auth::id())->first();

        $order = new Order;
        $order->user_id = Auth::id();
        $order->orderID = "OR" . random_int(10, 99) . date("Ymdhi");
        $order->shipping_address = $request->shipping_address;
        $order->receiver_name = $request->receiver_name;
        $order->number = $request->number;
        $order->email = $request->email;
        $order->country = $request->country;
        $order->sub_total = $cart->sub_total;
        $order->discount = $cart->discount;
        $order->total = $cart->total;
        $order->status = 'processing';
        $order->save();
        $this->addItem($cart);

        $order = Order::where('user_id', Auth::id())->latest()->first();

        return redirect()->route('payment.create', $order)
            ->with('success', 'order has been placed successfully.');
    }

    private function addItem($cart)
    {
        $order = order::where('user_id', Auth::id())->latest()->first();


        foreach ($cart->services()->get() as $service) {

            $order->services()->attach($service->id, [
                'size' => 'NA',
                'qty' => $service->pivot->qty,
                'discount' => 0,
                'total' => $service->pivot->qty * $service->selling_price,

            ]);
        }



        foreach ($cart->products()->get() as $product) {
            $size = $product->pivot->size . '_qty';
            if ($size == 'small_qty') {
                $product->small_qty = $product->small_qty - $product->pivot->qty;
            }

            if ($size == 'medium_qty') {
                $product->medium_qty = $product->medium_qty - $product->pivot->qty;
            }

            if ($size == 'large_qty') {
                $product->large_qty = $product->large_qty - $product->pivot->qty;
            }

            if ($size == 'xl_qty') {
                $product->xl_qty = $product->xl_qty - $product->pivot->qty;
            }

            if ($size == 'xxl_qty') {
                $product->xxl_qty = $product->xxl_qty - $product->pivot->qty;
            }



            $order->products()->attach($product->id, [
                'size' => $product->pivot->size,
                'qty' => $product->pivot->qty,
                'discount' => (($product->selling_price * $product->discount) / (100 - $product->discount)) * $product->pivot->qty,
                'total' => $product->selling_price * $product->pivot->qty
            ]);
            $product->save();
        }
    }


    public function cancelOrder(Request $request)
    {
        $order = order::find($request->id);
        foreach ($order->products()->get() as $product) {
            $size = $product->pivot->size . '_qty';
            if ($size == 'small_qty') {
                $product->small_qty = $product->small_qty + $product->pivot->qty;
            }
            if ($size == 'medium_qty') {
                $product->medium_qty = $product->medium_qty + $product->pivot->qty;
            }

            if ($size == 'large_qty') {
                $product->large_qty = $product->large_qty + $product->pivot->qty;
            }

            if ($size == 'xl_qty') {
                $product->xl_qty = $product->xl_qty + $product->pivot->qty;
            }

            if ($size == 'xxl_qty') {
                $product->xxl_qty = $product->xxl_qty + $product->pivot->qty;
            }

            $product->save();


        }
        $order->status = 'cancelled';
        $payment = $order->payment()->first();
        $payment->status = 'returned';
        $order ->save();
        $payment->save();

        return redirect()->back()
            ->with('status', 'order has been cancelled successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order  $order)
    {
        $data['payment'] = $order->payment()->first();
        $data['products'] = $order->products()->get();
        $data['services'] = $order->services()->get();
        return view('orders.show', compact('order'), $data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order  $order)
    {
        return view('orders.edit', compact('order'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'shipping_address' => ['required', 'string', 'max:200'],
            'receiver_name' => ['required', 'string', 'max:20'],
            'number' => ['required', 'numeric', 'min:10', 'max:15'],
            'email' => ['required', 'email'],
            'country' => ['required', 'string', 'max:50'],
            'sub_total' => ['required', 'numeric', 'between:0,9999999999.99'],
            'discount' => ['required', 'numeric', 'between:0,99.99'],
            'total' => ['required', 'numeric', 'between:0,9999999999.99'],
            'status' => ['required', 'string', 'max:10'],
        ]);
        $order = order::find($id);
        $order->shipping_address = $request->shipping_address;
        $order->receiver_name = $request->receiver_name;
        $order->number = $request->number;
        $order->email = $request->email;
        $order->country = $request->country;
        $order->sub_total = $request->sub_total;
        $order->discount = $request->discount;
        $order->total = $request->total;
        $order->status = $request->status;
        $order->users_id = $order->users_id;
        $order->save();
        return redirect()->route('admin.orders')
            ->with('success', 'order Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.

     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order  $order)
    {
        $order->delete();
        return redirect()->route('admin.orders')
            ->with('success', 'order has been deleted successfully');
    }

    public function showorders(){
        $orders=Order::all();

            return view('admin.orders',['orders'=>$orders]);
    }

    public function statusupdate(Request $request){
        $order=Order::find($request->id);
        $order->status=$request->status;

        if ($request->status == "cancelled") {
            foreach ($order->products()->get() as $product) {
                $size = $product->pivot->size . '_qty';
                if ($size == 'small_qty') {
                    $product->small_qty = $product->small_qty + $product->pivot->qty;
                }
                if ($size == 'medium_qty') {
                    $product->medium_qty = $product->medium_qty + $product->pivot->qty;
                }

                if ($size == 'large_qty') {
                    $product->large_qty = $product->large_qty + $product->pivot->qty;
                }

                if ($size == 'xl_qty') {
                    $product->xl_qty = $product->xl_qty + $product->pivot->qty;
                }

                if ($size == 'xxl_qty') {
                    $product->xxl_qty = $product->xxl_qty + $product->pivot->qty;
                }

                $product->save();


            } 

            $payment = $order->payment()->first();
            $payment->status = 'returned';
            $payment->save();
        } elseif ($request->status == "delivered") {
            $payment = $order->payment()->first();
            
            $payment->status = 'completed';
            $payment->save();
        } else {
            $payment = $order->payment()->first();
            
            $payment->status = 'processing';
            $payment->save();
        }
        $order->save();
        return redirect()->back()->with('message', 'Status has been updated Sucessfully !');
    }
    public function showproducts(){
        $orders=Order::all();

            return view('admin.orders',['orders'=>$orders]);
    }

}
