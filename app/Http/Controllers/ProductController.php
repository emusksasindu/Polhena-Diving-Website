<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = product::orderBy('id', 'desc')->get();
        return view('admin.products', $data);
    }

    public function user_index()
    {
        $data['products'] = product::orderBy('id', 'desc')->get();
        return view('products.index', $data);
    }



    public function search(Request $request)
    {
    $request->validate([
        'keyword' => 'required'
    ]);
    $keyword = $request->get('keyword');
    //single keyword search - start
    $products = Product::where('name', 'like', '%'.$keyword.'%')
    ->orWhere('description', 'like', '%'.$keyword.'%')
    ->orWhere('size', 'like', '%'.$keyword.'%')
    ->orWhere('status', 'like', '%'.$keyword.'%')
    ->get();
    $products = Product::paginate(5); 
    // single keyword search - end
    return view('products.index', compact('products'));      
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
            'imageUrl_1' => ['required'],
            'colors' => ['required'],
            'status' => ['required'],
            'selling_price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'cost' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);
        $product = new product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->size = $request->size;
        $product->colors = $request->colors;
        $product->imageUrl_1 = $request->imageUrl_1;
        $product->imageUrl_2 = $request->imageUrl_2;
        $product->imageUrl_3 = $request->imageUrl_3;
        $product->categories_id = $request->categories_id;
        $product->status = $request->status;
        $product->cost = $request->cost;
        $product->selling_price = $request->selling_price;
        $product->save();
        return redirect()->route('admin.products')
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
            'imageUrl_1' => ['required'],
            'colors' => ['required'],
            'status' => ['required'],
            'selling_price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'cost' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);
        $product = product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->size = $request->size;
        $product->colors = $request->colors;
        $product->imageUrl_1 = $request->imageUrl_1;
        $product->imageUrl_2 = $request->imageUrl_2;
        $product->imageUrl_3 = $request->imageUrl_3;
        $product->categories_id = $request->categories_id;
        $product->status = $request->status;
        $product->cost = $request->cost;
        $product->selling_price = $request->selling_price;
        $product->save();
        return redirect()->route('admin.products')
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
        return redirect()->route('admin.products')
            ->with('success', 'Product has been deleted successfully');
    }
}
