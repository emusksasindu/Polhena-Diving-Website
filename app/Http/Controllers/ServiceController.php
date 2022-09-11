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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.addservice');
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
        $service = new service;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->qty = $request->qty;
        $service->size = $request->size;
        $service->color = $request->color;
        $service->category = $request->category;
        $service->status = $request->status;
        $service->buying_price = $request->buying_price;
        $service->selling_price = $request->selling_price;
        $service->save();
        return redirect()->route('services.index')
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
            'qty' => ['required', 'integer', 'max:1000000'],
            'size' => ['required'],
            'color' => ['required'],
            'category' => ['required'],
            'status' => ['required'],
            'selling_price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'buying_price' => ['required', 'numeric', 'between:0,9999999999.99'],
        ]);
        $service = service::find($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->qty = $request->qty;
        $service->size = $request->size;
        $service->color = $request->color;
        $service->category = $request->category;
        $service->status = $request->status;
        $service->buying_price = $request->buying_price;
        $service->selling_price = $request->selling_price;
        $service->save();
        return redirect()->route('services.index')
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
        return redirect()->route('services.index')
            ->with('success', 'service has been deleted successfully');
    }
}
