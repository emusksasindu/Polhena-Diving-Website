<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = product::orderBy('id', 'desc')->paginate(5);
        return view('admin.products', $data);
    }

    public function user_index()
    {
        session()->put('category_id','no');
        session()->put('max_price', 'no');
        session()->put('min_price', 'no');
        session()->put('size', 'no');

        $data['categories'] = category::where('type','product')
        ->get();
        $data['products'] = product::orderBy('selling_price', 'asc')
        ->paginate(9);
        return view('products.index', $data);
    }

    public function filter(Request $request)
    {

        $id = $request->id;
        $max_price = $request->max_price;
        $min_price = $request->min_price;
        $size = $request->size;

        session()->put('category_id', $id);
        session()->put('max_price', $max_price);
        session()->put('min_price', $min_price);
        session()->put('size', $size);

        $data['categories'] = category::get();

        if($id != 'no' && $max_price != 'no' && $min_price != 'no' && $size != 'no')
        {
            $data['products'] = product::where('category_id', '=', $id)
            ->where($size, '>', 0)
            ->whereBetween('selling_price', [$min_price, $max_price])
            ->orderBy('selling_price', 'asc')
            ->paginate(9);
        }
        else if($id != 'no' && $max_price != 'no' && $min_price != 'no' && $size == 'no')
        {
            $data['products'] = product::where('category_id', '=', $id)
            ->whereBetween('selling_price', [$min_price, $max_price])
            ->orderBy('selling_price', 'asc')
            ->paginate(9);

        }
        else if($id == 'no' && $max_price != 'no' && $min_price != 'no' && $size == 'no')
        {
            $data['products'] = product::whereBetween('selling_price', [$min_price, $max_price])
            ->orderBy('selling_price', 'asc')
            ->paginate(9);

        }
        else if($id != 'no' && $max_price == 'no' && $min_price == 'no' && $size != 'no')
        {
            $data['products'] = product::where('category_id', '=', $id)
            ->where($size, '>', 0)
            ->orderBy('selling_price', 'asc')
            ->paginate(9);

        }
        else if($id == 'no' && $max_price == 'no' && $min_price == 'no' && $size != 'no')
        {
            $data['products'] = product::where($size, '>', 0)
            ->orderBy('selling_price', 'asc')
            ->paginate(9);

        }
        else if($id == 'no' && $size != 'no' && $max_price != 'no' && $min_price != 'no')
        {
            $data['products'] = product::where($size, '>', 0)
            ->whereBetween('selling_price', [$min_price, $max_price])
            ->orderBy('selling_price', 'asc')
            ->paginate(9);

        }
        else if($id != 'no'&& $max_price == 'no' && $min_price == 'no' && $size == 'no')
        {
            $data['products'] = product::where('category_id', '=', $id)
            ->orderBy('selling_price', 'asc')
            ->paginate(9);

        }
        return view('products.index', $data);
    }





    public function search(Request $request)
    {
    $request->validate([
        'keyword' => 'required'
    ]);
    $keyword = $request->keyword;
    $data['categories'] = category::get();
    //single keyword search - start
    $data['products'] = Product::where('name', 'like', '%'.$keyword.'%')
    ->orderBy('selling_price', 'asc')
    ->paginate(9); 
    // single keyword search - end
    $user = Auth::user();
    if(empty($user)|| $user->type == 'U')
    {
        return view('products.index', $data);
    }
        return view('admin.products', $data);  
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = category::orderBy('id', 'desc')
        ->where('type','product')
        ->get();
        return count($data['categories']) == 0 ? 
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
            'category_id' => ['required'],
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
        $product->image_1 = $image_path_1;
        $product->image_2 = $image_path_2;
        $product->image_3 = $image_path_3;
        $product->category_id = $request->category_id;
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
        $category= category::find($product->category_id);
        $product->category = $category->name;
        $data['products'] = product::where('category_id', '=', $product->category_id)
        ->orderBy('selling_price', 'asc')
        ->paginate(10);
        return view('products.show', compact('product'),$data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product  $product)
    {
        $data['categories'] = category::orderBy('id', 'desc')
        ->where('type','product')
        ->get();
        return view('products.edit', compact('product'),$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:500'],
            'small_qty' => ['required', 'integer', 'max:1000000'],
            'medium_qty' => ['required', 'integer', 'max:1000000'],
            'large_qty' => ['required', 'integer', 'max:1000000'],
            'xl_qty' => ['required', 'integer', 'max:1000000'],
            'xxl_qty' => ['required', 'integer', 'max:1000000'],
            'image_1' => ['image'],
            'image_2' => ['image'],
            'image_3' => ['image'],
            'status' => ['required'],
            'category_id' => ['required'],
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
        if(!empty($request->image_1))
        {
            unlink('storage/'.$product->image_1);
            $image_path_1 = $request->image_1->store('uploads/products','public');
            $product->image_1 = $image_path_1;
        };

        if(!empty($request->image_2))
        {
            unlink('storage/'.$product->image_2);
            $image_path_1 = $request->image_2->store('uploads/products','public');
            $product->image_2 = $image_path_1;
        };

        if(!empty($request->image_3))
        {
            unlink('storage/'.$product->image_3);
            $image_path_1 = $request->image_3->store('uploads/products','public');
            $product->image_3 = $image_path_1;
        };
        ///////////////////////////////////////////////////////
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->discount = $request->discount;
        $product->cost = $request->cost;
        $product->selling_price = $request->selling_price;
        $product->save();
        return $this->index()
            ->with('success', 'Product has been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
    
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product=product::find($request->id);
        unlink('storage/'.$product->image_1);
        unlink('storage/'.$product->image_2);
        unlink('storage/'.$product->image_3);
        $product->delete();
        return $this->index()
            ->with('success', 'Product has been deleted successfully');
    }
}
