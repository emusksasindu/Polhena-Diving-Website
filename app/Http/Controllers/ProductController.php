<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = product::orderBy('id', 'desc')->get();
        return view('products.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:500'],
            'qty' => ['required', 'integer', 'max:1000000'],
            'size' => ['required'],
            'color' => ['required'],
            'category' => ['required'],
            'status' => ['required'],
            'selling_price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'buying_price' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);
        $product = new product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->category = $request->category;
        $product->status = $request->status;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->save();
        return redirect()->route('products.index')
            ->with('success', 'Product has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product  $product)
    {
        return view('products.show', compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product  $product)
    {
        return view('products.edit', compact('product'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:500'],
            'qty' => ['required', 'integer', 'max:1000000'],
            'size' => ['required'],
            'color' => ['required'],
            'category' => ['required'],
            'status' => ['required'],
            'selling_price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'buying_price' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);
        $product = product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->category = $request->category;
        $product->status = $request->status;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->save();
        return redirect()->route('products.index')
            ->with('success', 'Product Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
    
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product  $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product has been deleted successfully');
    }
}
