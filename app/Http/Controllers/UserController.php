<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::orderBy('id', 'desc')->get();
        return view('admin.users', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
        $user = new User;
        $user->name = $request->name;
        $user->description = $request->description;
        $user->qty = $request->qty;
        $user->size = $request->size;
        $user->colors = $request->colors;
        $user->imageUrl_1 = $request->imageUrl_1;
        $user->imageUrl_2 = $request->imageUrl_2;
        $user->imageUrl_3 = $request->imageUrl_3;
        $user->categories_id = $request->categories_id;
        $user->status = $request->status;
        $user->cost = $request->cost;
        $user->selling_price = $request->selling_price;
        $user->save();
        return redirect()->route('admin.users')
            ->with('success', 'user has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User  $user)
    {
        return view('users.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User  $user)
    {
        return view('users.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->description = $request->description;
        $user->qty = $request->qty;
        $user->size = $request->size;
        $user->colors = $request->colors;
        $user->imageUrl_1 = $request->imageUrl_1;
        $user->imageUrl_2 = $request->imageUrl_2;
        $user->imageUrl_3 = $request->imageUrl_3;
        $user->categories_id = $request->categories_id;
        $user->status = $request->status;
        $user->cost = $request->cost;
        $user->selling_price = $request->selling_price;
        $user->save();
        return redirect()->route('admin.users')
            ->with('success', 'user Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
    
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User  $user)
    {
        $user->delete();
        return redirect()->route('admin.users')
            ->with('success', 'user has been deleted successfully');
    }
}
