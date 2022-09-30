<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::orderBy('id', 'desc')->get();
        return view('admin.carts', $data);
    }

    public function user_index()
    {
        $data['carts'] = Cart::orderBy('id', 'desc')->get();
        return view('cart.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->size == 'xxl')
        {
            $request->validate([
                'xxl_qty' => ['required', 'numeric', 'min:1','max:50'],
            ]);

            $user_id = Auth::user()->id;
            

        }
        else if($request->size == 'xl')
        {
            $request->validate([
                'xl_qty' => ['required', 'numeric','min:1','max:50']
            ]);

        }
        else if($request->size == 'large')
        {
            $request->validate([
                'large_qty' => ['required', 'numeric','min:1','max:50']
            ]);

        }
        else if($request->size == 'medium')
        {
            $request->validate([
                'medium_qty' => ['required', 'numeric','min:1','max:50']
            ]);

        }
        else if($request->size == 'small')
        {
            $request->validate([
                'small_qty' => ['required', 'numeric','min:1','max:50']
            ]);

        }
       

        return redirect()->route('cart.user_index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $cart = new Cart;
        $cart->discount = $request->discount;
        $cart->sub_total = $request->sub_total;
        $cart->total = $request->total;
        $cart->users_id = $request->users_id;
        $cart->save();
        return redirect()->route('admin.carts')
            ->with('success', 'cart has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart  $cart)
    {
        return view('carts.show', compact('cart'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart  $cart)
    {
        return view('carts.edit', compact('cart'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'discount' => ['required', 'numeric', 'between:0,99.99'],
            'sub_total' => ['required', 'numeric', 'between:0,9999999999.99'],
            'total' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);


        $cart = Cart::find($id);
        $cart = new Cart;
        $cart->discount = $request->discount;
        $cart->sub_total = $request->sub_total;
        $cart->total = $request->total;
        $cart->users_id = $request->users_id;
        $cart->save();
        return redirect()->route('admin.carts')
            ->with('success', 'cart Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
    
     * @param  \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart  $cart)
    {
        $cart->delete();
        return redirect()->route('admin.carts')
            ->with('success', 'cart has been deleted successfully');
    }
}
