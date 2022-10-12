<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $data['payments'] = Payment::orderBy('id', 'desc')->get();
        return view('admin.payments', $data);
    }

    public function user_index()
    {
        $data['payments'] = Payment::orderBy('id', 'desc')->get();
        return view('payments.index', $data);
    }

    public function viewDashboard()
    {
        //All orders
        $allOrders = order::orderBy('id', 'desc')->paginate(10);
        $data['orders'] = $allOrders;
        $validOrders = order::where('status','!=','cancelled')
        ->get();


        //valid order count
        $validOrdersCount = $validOrders->count();
        $data['OrderCount'] = $validOrdersCount;
        
        //stock
        
        $smallQty = product::sum('small_qty');
        $medium_qty = product::sum('medium_qty');
        $large_qty = product::sum('large_qty');
        $xl_qty = product::sum('xl_qty');
        $xxl_qty = product::sum('xxl_qty');
        $data['Stock'] = $smallQty + $medium_qty + $large_qty + $xl_qty + $xxl_qty;
       
        $productsRevenue = 0;
        $servicesRevenue = 0;
        $productsProfit = 0;
        $servicesProfit = 0;
        foreach($validOrders as $order)
        { 
            $soldProducts = $order -> products() ->get();
            $soldServices = $order -> services() -> get();

            foreach($soldProducts as $product)
            {
                $productsRevenue = $productsRevenue + ($product->selling_price*$product->pivot->qty);
                $productsProfit =  $productsProfit + ($product->selling_price - $product->cost)*$product->pivot->qty;
            }

            foreach($soldServices as $service)
            {
                $servicesRevenue = $servicesRevenue + ($service->selling_price*$service->pivot->qty);
                $servicesProfit = $servicesProfit + ($service->selling_price - $service->cost)*$service->pivot->qty;
            }
          
        }

        //total Revenue

        $totalRevenue = $productsRevenue + $servicesRevenue;
        $data['Revenue'] = $totalRevenue;
       
       
        //Total Profit

        $totalProfit = $productsProfit + $servicesProfit;
        $data['Profit'] = $totalProfit;
         


        //chat
        $data['chats'] = (new ChatController)->chatMac();

        return view('admin.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($orderId)
    {
        // $cart = cart::where('user_id','=',Auth::id())->first();
        $order = order::find($orderId);
        $data['products'] = $order->products()->get();
        $data['services'] = $order->services()->get();
        $data['order'] = $order;
        return view('payment.create', $data);
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
            'card_number' => ['required', 'integer', 'min:1000000000000000','max:9999999999999999'],
            'mm' => ['required', 'numeric', 'min:1', 'max:12'],
            'yy' => ['required', 'integer', 'min:22', 'max:99'],
            'cvv' => ['required', 'integer', 'min:100', 'max:999']
        ]);
        $payment = Payment::where('order_id',$request->order_id)->first();
        $payment->card_number = $request->card_number;
        $payment->amount = $request->total;
        $payment->status = 'processing';
        $payment->order_id = $request->order_id;
        $payment->save();

        return redirect()->route('orders.index')
            ->with('success', 'payment has been created successfully.');
    }

    public function corrupted($order)
    {   $payment = new Payment;
        $payment->card_number = 0000000000000000;
        $payment->amount = 0;
        $payment->status = 'corrupted';
        $payment->order_id = $order->id;
        $payment->save();

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment  $payment)
    {
        return view('payments.show', compact('payment'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment  $payment)
    {
        return view('payments.edit', compact('payment'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'card_number' => ['required', 'integer', 'max:16'],
            'amount' => ['required', 'numeric', 'between:0,9999999999.99'],
            'status' => ['required'],
        ]);
        $payment = payment::find($id);
        $payment->card_number = $request->card_number;
        $payment->amount = $request->amount;
        $payment->status = $request->status;
        $payment->orders_id = $request->orders_id;
        $payment->save();
        return redirect()->route('admin.payments')
            ->with('success', 'payment Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
    
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment  $payment)
    {
        $payment->delete();
        return redirect()->route('admin.payments')
            ->with('success', 'payment has been deleted successfully');
    }
}
