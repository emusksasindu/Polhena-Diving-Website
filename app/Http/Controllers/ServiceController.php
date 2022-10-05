<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $data['services'] = service::orderBy('id', 'desc')->paginate(5);
        return view('admin.service', $data);
    }

    public function user_index()
    {
        session()->put('category_id','no');
        session()->put('max_price', 'no');
        session()->put('min_price', 'no');
        $data['categories'] = category::where('type','service')
        ->get();
        $data['services'] = service::orderBy('id', 'desc')
        ->paginate(9);
        return view('services.index', $data);
    }



    public function filter(Request $request)
    {

        $id = $request->id;
        $max_price = $request->max_price;
        $min_price = $request->min_price;


        session()->put('category_id', $id);
        session()->put('max_price', $max_price);
        session()->put('min_price', $min_price);

        $data['categories'] = category::where('type','service')->get();

        if($id != 'no' && $max_price != 'no' && $min_price != 'no')
        {
            $data['services'] = service::where('category_id', '=', $id)
            ->whereBetween('selling_price', [$min_price, $max_price])
            ->orderBy('selling_price', 'asc')
            ->paginate(9);
        }
        else if($id != 'no' && $max_price == 'no' && $min_price == 'no')
        {
            $data['services'] = service::where('category_id', '=', $id)
            ->orderBy('selling_price', 'asc')
            ->paginate(9);

        }
        else if($id == 'no' && $max_price != 'no' && $min_price != 'no')
        {
            $data['services'] = service::whereBetween('selling_price', [$min_price, $max_price])
            ->orderBy('selling_price', 'asc')
            ->paginate(9);

        }
      
        return view('services.index', $data);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = category::orderBy('id', 'desc')
        ->where('type','service')
        ->get();
        return count($data['categories']) == 0 ? 
        redirect()->route('categories.create')->with('success', 'Please insert categories before save products or services!') :
        view('services.create',$data);
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
            'imageUrl_1' => ['required','image'],
            'imageUrl_2' => ['required','image'],
            'imageUrl_3' => ['required','image'],
            'status' => ['required'],
            'selling_price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'cost' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);
        $service = new service;
        $service->serviceID = "SERVICE".random_int(100000, 999999);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->category_id = $request->category_id;
        $service->status = $request->status;
        $service->imageUrl_1 = $request->imageUrl_1->store('uploads/services','public');
        $service->imageUrl_2 = $request->imageUrl_2->store('uploads/services','public');
        $service->imageUrl_3 = $request->imageUrl_3->store('uploads/services','public');
        $service->cost = $request->cost;
        $service->selling_price = $request->selling_price;
        $service->save();
        return redirect()->route('services.create')
            ->with('success', 'service has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service  $service)
    {
        $category= category::find($service->category_id);
        $service->category = $category->name;
        $data['services'] = service::where('category_id', '=', $service->category_id)
        ->orderBy('selling_price', 'asc')
        ->paginate(10);
        return view('services.show', compact('service'),$data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
    $request->validate([
        'keyword' => 'required'
    ]);
    $keyword = $request->keyword;
    $data['categories'] = category::get();
    //single keyword search - start
    $data['services'] = service::where('name', 'like', '%'.$keyword.'%')
    ->orderBy('selling_price', 'asc')
    ->paginate(9); 
    // single keyword search - end
    $user = Auth::user();
    if(empty($user)|| $user->type == 'U')
    {
        return view('services.index', $data);
    }
        return view('admin.service', $data);  
    }




    public function edit(service  $service)
    {
        $data['categories'] = category::orderBy('id', 'desc')
        ->where('type','service')
        ->get();
        return view('services.edit', compact('service'),$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:500'],
            'imageUrl_1' => ['image'],
            'imageUrl_2' => ['image'],
            'imageUrl_3' => ['image'],
            'status' => ['required'],
            'selling_price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'cost' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);
        $service = service::find($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->category_id = $request->category_id;
        $service->status = $request->status;

         //service image upload if it is updated////////////////
         if(!empty($request->imageUrl_1))
        {
            unlink('storage/'.$service->imageUrl_1);
            $image_path_1 = $request->imageUrl_1->store('uploads/services','public');
            $service->imageUrl_1 = $image_path_1;
        };

        if(!empty($request->imageUrl_2))
        {
            unlink('storage/'.$service->imageUrl_2);
            $image_path_1 = $request->imageUrl_2->store('uploads/services','public');
            $service->imageUrl_2 = $image_path_1;
        };

        if(!empty($request->imageUrl_3))
        {
            unlink('storage/'.$service->imageUrl_3);
            $image_path_1 = $request->imageUrl_3->store('uploads/services','public');
            $service->imageUrl_3 = $image_path_1;
        };
        ///////////////////////////////////////////////////////

        $service->cost = $request->cost;
        $service->selling_price = $request->selling_price;
        $service->save();
        return $this->index()
            ->with('success', 'service has been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
    
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $service=service::find($request->id);
        unlink('storage/'.$service->imageUrl_1);
        unlink('storage/'.$service->imageUrl_2);
        unlink('storage/'.$service->imageUrl_3);
        $service->delete();
        return $this->index()
            ->with('success', 'service has been deleted successfully');
    }
}
