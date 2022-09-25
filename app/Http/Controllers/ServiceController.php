<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data['services'] = service::orderBy('id', 'desc')->get();
        return view('admin.service', $data);
    }

    public function user_index()
    {
        $data['services'] = service::orderBy('id', 'desc')->get();
        return view('services.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
            'imageUrl_1' => ['required'],
            'status' => ['required'],
            'selling_price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'cost' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);
        $service = new service;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->categories_id = $request->categories_id;
        $service->status = $request->status;
        $service->imageUrl_1 = $request->imageUrl_1;
        $service->imageUrl_2 = $request->imageUrl_2;
        $service->imageUrl_3 = $request->imageUrl_3;
        $service->cost = $request->cost;
        $service->selling_price = $request->selling_price;
        $service->save();
        return redirect()->route('admin.service')
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
        return view('services.show', compact('service'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service  $service)
    {
        return view('services.edit', compact('service'));
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
            'imageUrl_1' => ['required'],
            'status' => ['required'],
            'selling_price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'cost' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);
        $service = service::find($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->categories_id = $request->categories_id;
        $service->status = $request->status;
        $service->imageUrl_1 = $request->imageUrl_1;
        $service->imageUrl_2 = $request->imageUrl_2;
        $service->imageUrl_3 = $request->imageUrl_3;
        $service->cost = $request->cost;
        $service->selling_price = $request->selling_price;
        $service->save();
        return redirect()->route('admin.service')
            ->with('success', 'service Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
    
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service  $service)
    {
        $service->delete();
        return redirect()->route('admin.service')
            ->with('success', 'service has been deleted successfully');
    }
}
