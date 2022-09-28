<?php

namespace App\Http\Controllers;

use App\Models\category;
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
        $data['categories'] = category::orderBy('id', 'desc')->get();
        return category::count() == 0 ? 
        redirect()->route('categories.create')->with('success', 'Please insert categories before save products or services!') :
        view('products.create',$data);
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
            'small_qty' => ['required', 'integer', 'max:1000000'],
            'medium_qty' => ['required', 'integer', 'max:1000000'],
            'large_qty' => ['required', 'integer', 'max:1000000'],
            'xl_qty' => ['required', 'integer', 'max:1000000'],
            'xxl_qty' => ['required', 'integer', 'max:1000000'],
            'image_1' => ['required','image'],
            'image_2' => ['required','image'],
            'image_3' => ['required','image'],
            'status' => ['required'],
            'categories_id' => ['required'],
            'discount' => ['required', 'numeric', 'between:0,99.99'],
            'selling_price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'cost' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);
        $product = new product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->small_qty = $request->small_qty;
        $product->medium_qty = $request->medium_qty;
        $product->large_qty = $request->large_qty;
        $product->xl_qty = $request->xl_qty;
        $product->xxl_qty = $request->xxl_qty;
        
        //product image upload////////////////
        $image_path_1 = $request->image_1->store('uploads/products','public');
        $image_path_2 =$request->image_2->store('uploads/products','public');
        $image_path_3 =$request->image_3->store('uploads/products','public');
        //////////////////////////////////////
        //product image resize////////////////
        //////////////////////////////////////
        $product->image_1 = $image_path_1;
        $product->image_2 = $image_path_2;
        $product->image_3 = $image_path_3;
        $product->categories_id = $request->categories_id;
        $product->status = $request->status;
        $product->discount = $request->discount;
        $product->cost = $request->cost;
        $product->selling_price = $request->selling_price;
        $product->save();
        return redirect()->route('products.create')
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
            'small_qty' => ['required', 'integer', 'max:1000000'],
            'medium_qty' => ['required', 'integer', 'max:1000000'],
            'large_qty' => ['required', 'integer', 'max:1000000'],
            'xl_qty' => ['required', 'integer', 'max:1000000'],
            'xxl_qty' => ['required', 'integer', 'max:1000000'],
            'image_1' => ['required','image'],
            'image_2' => ['required','image'],
            'image_3' => ['required','image'],
            'status' => ['required'],
            'categories_id' => ['required'],
            'discount' => ['required', 'numeric', 'between:0,99.99'],
            'selling_price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'cost' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);
        $product = product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->small_qty = $request->small_qty;
        $product->medium_qty = $request->medium_qty;
        $product->large_qty = $request->large_qty;
        $product->xl_qty = $request->xl_qty;
        $product->xxl_qty = $request->xxl_qty;
        //product image upload if it is updated////////////////
        if($product->image_1 != $request->image_1)
        {
            $image_path_1 = $request->image_1->store('uploads/products','public');
            $product->image_1 = $image_path_1;
        };

        if($product->image_2 != $request->image_2)
        {
            $image_path_1 = $request->image_2->store('uploads/products','public');
            $product->image_2 = $image_path_1;
        };

        if($product->image_3 != $request->image_3)
        {
            $image_path_1 = $request->image_3->store('uploads/products','public');
            $product->image_3 = $image_path_1;
        };
        ///////////////////////////////////////////////////////
        $product->categories_id = $request->categories_id;
        $product->status = $request->status;
        $product->discount = $request->discount;
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
