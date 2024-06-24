<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        $data['chats'] = (new ChatController)->chatMac();
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
        return redirect()->route('categories.create')
            ->with('success', 'category has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $categorie
     * @return \Illuminate\Http\Response
     */
    // public function show(Category  $categorie)
    // {
    //     return view('categories.show', compact('categorie'));
    // }
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
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:20'],
    //         'type' => ['required', 'string', 'max:10'],
    //     ]);


    //     $categorie = new Category;
    //     $categorie->name = $request->name;
    //     $categorie->type = $request->type;
    //     $categorie->save();
    //     return redirect()->route('admin.categories')
    //         ->with('success', 'category has been updated successfully');
    // }
    /**
     * Remove the specified resource from storage.

     * @param  \App\Category $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category  $categorie)
    {
        $categorie->delete();
        return redirect()->route('admin.categories')
            ->with('success', 'category has been deleted successfully');
    }


    // admin view category details
    public function show(){
        $categories=Category::all();

            return view('admin/categories',['categories'=>$categories]);
    }
    public function editcategory($id){
        $data= Category::find($id);
        return view('admin.editcategory',['data'=>$data]);
    }
    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'type'=>'required',


        ]);

        $data=Category::find($request->id);
        $data->name=$request->name;
        $data->type=$request->type;

        $data->save();
        return redirect()->back()->with('message', 'Category Has Been Updated Sucessfully !');

    }
    public function delete($id){
        $category=Category::find($id);
        $category->delete();
        return redirect()->back();
    }

}
