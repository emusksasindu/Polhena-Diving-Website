<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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
        return view('orders.create');
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
            'sub_total' => ['required', 'numeric', 'between:0,9999999999.99'],
            'discount' => ['required', 'numeric', 'between:0,99.99'],
            'total' => ['required', 'numeric', 'between:0,9999999999.99'],
            'status' => ['required' ,'string', 'max:10'],
        ]);
        $order = new Order;
        $order->shipping_address = $request->shipping_address;
        $order->receiver_name = $request->receiver_name;
        $order->number = $request->number;
        $order->sub_total = $request->sub_total;
        $order->discount = $request->discount;
        $order->total = $request->total;
        $order->status = $request->status;
        $order->users_id = $request->users_id;
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
            'sub_total' => ['required', 'numeric', 'between:0,9999999999.99'],
            'discount' => ['required', 'numeric', 'between:0,99.99'],
            'total' => ['required', 'numeric', 'between:0,9999999999.99'],
            'status' => ['required' ,'string', 'max:10'],
        ]);
        $order = new Order;
        $order->shipping_address = $request->shipping_address;
        $order->receiver_name = $request->receiver_name;
        $order->number = $request->number;
        $order->sub_total = $request->sub_total;
        $order->discount = $request->discount;
        $order->total = $request->total;
        $order->status = $request->status;
        $order->users_id = $request->users_id;
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
}
