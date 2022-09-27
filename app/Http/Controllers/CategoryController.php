<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        return view('admin.categories', $data);
    }

    public function user_index()
    {
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        return view('categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name' => ['required', 'string', 'max:20'],
            'type' => ['required', 'string', 'max:10'],
        ]);


        $categorie = new Category;
        $categorie->name = $request->name;
        $categorie->type = $request->type;
        $categorie->save();
        return redirect()->route('admin.categories')
            ->with('success', 'categorie has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Category  $categorie)
    {
        return view('categories.show', compact('categorie'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Category  $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'type' => ['required', 'string', 'max:10'],
        ]);


        $categorie = new Category;
        $categorie->name = $request->name;
        $categorie->type = $request->type;
        $categorie->save();
        return redirect()->route('admin.categories')
            ->with('success', 'categorie Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
    
     * @param  \App\Category $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category  $categorie)
    {
        $categorie->delete();
        return redirect()->route('admin.categories')
            ->with('success', 'categorie has been deleted successfully');
    }
}
