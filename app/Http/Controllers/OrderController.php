<?php

namespace App\Http\Controllers;

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
        $data['orders'] = Order::orderBy('id', 'desc')->get();
        return view('orders.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cart'] = User::find(Auth::id())->cart()->first();
        return view('orders.create',$data);
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
            'number' => ['required','numeric', 'min:10','max:15'],
            'email' => ['required','email'],
            'country' => ['required', 'string', 'max:50'],
            'sub_total' => ['required', 'numeric', 'between:0,9999999999.99'],
            'discount' => ['required', 'numeric', 'between:0,99.99'],
            'total' => ['required', 'numeric', 'between:0,9999999999.99'],
            'status' => ['required' ,'string', 'max:10'],
        ]);
        $order = new Order;
        $order->user_id = Auth::id();
        $order->shipping_address = $request->shipping_address;
        $order->receiver_name = $request->receiver_name;
        $order->number = $request->number;
        $order->email = $request->email;
        $order->country = $request->country;
        $order->sub_total = $request->sub_total;
        $order->discount = $request->discount;
        $order->total = $request->total;
        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.orders')
            ->with('success', 'order has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order  $order)
    {
        return view('orders.show', compact('order'));
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
            'number' => ['required','numeric', 'min:10','max:15'],
            'email' => ['required','email'],
            'country' => ['required', 'string', 'max:50'],
            'sub_total' => ['required', 'numeric', 'between:0,9999999999.99'],
            'discount' => ['required', 'numeric', 'between:0,99.99'],
            'total' => ['required', 'numeric', 'between:0,9999999999.99'],
            'status' => ['required' ,'string', 'max:10'],
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

        if ($request->status == "canceled") {
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
        }
        $order->save();
        return redirect()->back()->with('message', 'Status Has Been updated Sucessfully !');
    }
    public function showproducts(){
        $orders=Order::all();

            return view('admin.orders',['orders'=>$orders]);
    }

}
