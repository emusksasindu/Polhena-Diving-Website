<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
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
            'card_number' => ['required', 'integer', 'max:16'],
            'amount' => ['required', 'numeric', 'between:0,9999999999.99'],
            'status' => ['required'],
        ]);
        $payment = new Payment;
        $payment->card_number = $request->card_number;
        $payment->amount = $request->amount;
        $payment->status = $request->status;
        $payment->orders_id = $request->orders_id;
        $payment->save();
        return redirect()->route('admin.payments')
            ->with('success', 'payment has been created successfully.');
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
        $payment = new Payment;
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
