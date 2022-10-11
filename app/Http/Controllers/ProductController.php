<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\order;
use App\Models\payment;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = product::orderBy('id', 'desc')->paginate(5);
        $data['chats'] = (new ChatController)->chatMac();
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

        $data['categories'] = category::where('type','product')
        ->get();

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
        $product->productID = "PR".random_int(10, 99). date("Ymdhi");
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

    public function finance(Request $request) {
        $from_date = null;
        $to_date = null;
        if ($request->from_date || $request->to_date) {
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            if ($to_date == NULL) {
                $order_items = DB::table('order_item')->select('*')->whereDate('created_at','=', $from_date)
                                                                    ->whereNull('service_id')->get();
            }elseif ($from_date == NULL) {
                $order_items = DB::table('order_item')->select('*')->whereDate('created_at','=', $to_date)
                                                                    ->whereNull('service_id')->get();
            }elseif ($to_date != NULL && $from_date != NULL){
                $order_items = DB::table('order_item')->select('*')->whereDate('created_at','>=', $from_date)
                                                                    ->whereDate('created_at','<=', $to_date)
                                                                    ->whereNull('service_id')
                                                                    ->get();
            }
        } else {
            $order_items = DB::table('order_item')->select('*')->whereNull('service_id')->get();
        }

        $order_products = [];

        $product_price = 0;
        $product_cost = 0;
        foreach ($order_items as $order_item) {
            $order = order::find($order_item->order_id);

            if($order->status != "cancelled") {
                $order_product = [];

                $product = product::find($order_item->product_id);
                $payment = payment::find($order_item->order_id);
    
                $order_product['id'] = $order_item->product_id;
                $order_product['name'] = $product->name;
                $order_product['price'] = $product->selling_price;
                $order_product['quantity'] = $order_item->qty;
                $product_price += $order_product['price'] * $order_product['quantity'];
                $product_cost += $product->cost * $order_item->qty;
                if ($payment->status == "completed") {
                    $order_product['status'] = "Paid";
                } else {
                    $order_product['status'] = "Due";
                }
    
                array_push($order_products, $order_product);
            }
            
        }


        if ($request->from_date || $request->to_date) {
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            if ($to_date == NULL) {
                $order_itemsS = DB::table('order_item')->select('*')->whereDate('created_at','=', $from_date)
                                                                    ->whereNull('product_id')->get();
            }elseif ($from_date == NULL) {
                $order_itemsS = DB::table('order_item')->select('*')->whereDate('created_at','=', $to_date)
                                                                    ->whereNull('product_id')->get();
            }elseif ($to_date != NULL && $from_date != NULL){
                $order_itemsS = DB::table('order_item')->select('*')->whereDate('created_at','>=', $from_date)
                                                                    ->whereDate('created_at','<=', $to_date)
                                                                    ->whereNull('product_id')
                                                                    ->get();
            }
        } else {
            $order_itemsS = DB::table('order_item')->select('*')->whereNull('product_id')->get();
        }
        

        $order_services = [];

        $service_price = 0;
        $service_cost = 0;
        foreach ($order_itemsS as $order_item) {
            $order = order::find($order_item->order_id);

            if($order->status != "cancelled") {
                $order_service = [];

                $service = service::find($order_item->service_id);
                $payment = payment::find($order_item->order_id);

                $order_service['id'] = $order_item->service_id;
                $order_service['name'] = $service->name;
                $order_service['price'] = $service->selling_price;
                $order_service['quantity'] = $order_item->qty;
                $service_price += $order_service['price'] * $order_service['quantity'];
                $service_cost += $service->cost * $order_item->qty;
                if ($payment->status == "completed") {
                    $order_service['status'] = "Paid";
                } else {
                    $order_service['status'] = "Due";
                }

                array_push($order_services, $order_service);
            }
        }
        $profit = ($product_price + $service_price) - ($product_cost + $service_cost);

        // chart data
        $chart_order_items = DB::table('order_item')
                    ->select('*')
                    ->groupBy('created_at')
                    ->get();

        $chart_data = [];
        
        foreach ($chart_order_items as $order_item) {
            $chart_start_date = date('Y-m-d',strtotime($order_item->created_at)) . ' ' . '00:00:00';
            $chart_end_date = date('Y-m-d',strtotime($order_item->created_at)) . ' ' . '23:59:59';

            $query = "SELECT * FROM order_item WHERE ((created_at >= '".$chart_start_date."') AND (created_at <= '".$chart_end_date."')) AND service_id IS NULL AND (strftime('%Y', created_at) = strftime('%Y', DATE()))";
            $order_item_products = DB::select(DB::raw($query));
            $chart_product_profit = 0;
            $chart_product_total_sales = 0;
            foreach ($order_item_products as $order_item_product) {
                $product_order = order::find($order_item_product->order_id);
                if ($product_order->status != "cancelled") {
                    $product = product::find($order_item_product->product_id);
                    $chart_product_total_sales += $product->selling_price * $order_item_product->qty; 
                    $chart_product_profit += ($product->selling_price * $order_item_product->qty) - ($product->cost * $order_item_product->qty);
                }
            }


            $query = "SELECT * FROM order_item WHERE ((created_at >= '".$chart_start_date."') AND (created_at <= '".$chart_end_date."')) AND product_id IS NULL AND (strftime('%Y', created_at) = strftime('%Y', DATE()))";
            $order_item_services = DB::select(DB::raw($query));
            $chart_service_profit = 0;
            $chart_service_total_sales = 0;
            foreach ($order_item_services as $order_item_service) {
                $service_order = order::find($order_item_service->order_id);
                if ($service_order->status != "cancelled") {
                    $service = service::find($order_item_service->service_id);
                    $chart_service_total_sales += $service->selling_price * $order_item_service->qty;
                    $chart_service_profit += ($service->selling_price * $order_item_service->qty) - ($service->cost * $order_item_service->qty);
                }
            }
            
            $chart_d = [];

            if ($chart_product_profit != 0 || $chart_service_profit != 0) {
                $flag = true;
                if (count($chart_data) > 0) {
                    foreach ($chart_data as $value) {
                        if (array_key_exists(date('Y-m-d',strtotime($order_item->created_at)), $value)) {
                            $value[date('Y-m-d',strtotime($order_item->created_at))][0] += ($chart_product_total_sales + $chart_service_total_sales);
                            $value[date('Y-m-d',strtotime($order_item->created_at))][1] += ($chart_product_profit + $chart_service_profit);
                            $flag = false;
                            break;
                        } 
                    }
                }
                
                if ($flag){
                    $chart_d[date('Y-m-d',strtotime($order_item->created_at))][0] = $chart_product_total_sales + $chart_service_total_sales;
                    $chart_d[date('Y-m-d',strtotime($order_item->created_at))][1] = $chart_product_profit + $chart_service_profit;
                }
            }
            
            array_push($chart_data, $chart_d);
        }

        // dd($chart_data);

        $data['chats'] = (new ChatController)->chatMac();
        return view('admin.finance', ["order_products"=>$order_products, "order_services"=>$order_services, 'from_date'=>$from_date, 'to_date'=>$to_date, 'revenue'=>($product_price + $service_price), 'profit'=>$profit, 'chart_data'=>$chart_data],$data);
    }
}