<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::orderBy('id', 'desc')->get();
        return view('admin.posts', $data);
    }

    public function user_index()
    {
        $data['posts'] = Post::orderBy('id', 'desc')->get();
        return view('posts.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'type' => ['required', 'string', 'max:10'],
            'title' => ['required','string', 'max:500'],
            'body' => ['required','string', 'max:5000'],
        ]);
        $post = new Post;
        $post->type = $request->type;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->users_id = $request->users_id;
        $post->save();
        return redirect()->route('admin.posts')
            ->with('success', 'post has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post  $post)
    {
        return view('posts.show', compact('post'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post  $post)
    {
        return view('posts.edit', compact('post'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => ['required', 'string', 'max:10'],
            'title' => ['required','string', 'max:500'],
            'body' => ['required','string', 'max:5000'],
        ]);
        $post = new Post;
        $post->type = $request->type;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->users_id = $request->users_id;
        $post->save();
        return redirect()->route('admin.posts')
            ->with('success', 'post Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.

     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post  $post)
    {
        $post->delete();
        return redirect()->route('admin.posts')
            ->with('success', 'post has been deleted successfully');
    }
    // admin post function-----------------------------------------------
    public function createpost(Request $request){
        $this->validate($request,[
            'title'=>'required|max:250|min:10',
            'body'=>'required|max:2000|min:10',
            'imageUrl'=> 'required',

        ]);

            $addpost=new post();
            $addpost->title=$request->title;
            $addpost->body=$request->body;
            $addpost->type=$request->type;
            $addpost->user_id=Auth::user()->id;

            $addpost->imageUrl= $request->file('imageUrl')->store('uploads/post');

            $addpost->save();
            return redirect()->back()->with('message', 'Post Has Been Added Sucessfully !');

    }
    public function showposts(){
        $allpost=post::all();
        $data['chats'] = (new ChatController)->chatMac();
            return view('admin/posts',['posts'=>$allpost],$data);
    }
    public function deletepost($id){
        $post=post::find($id);
        $post->delete();
        return redirect()->back();
    }
    public function editpost($id)
    {
        $data= post::find($id);
        return view('admin/editpost',['data'=>$data]);
    }
    public function updatepost(Request $request){
        $data=post::find($request->id);

        $data->title=$request->title;
        $data->body=$request->body;
        $data->type=$request->type;

        if ($request->hasFile('imageUrl')) {
            $data->imageUrl= $request->file('imageUrl')->store('uploads/post');
        } else {
            $data->imageUrl = $data->imageUrl;
        }


        $data->save();
        return redirect()->back()->with('message', 'Post Has Been updated Sucessfully !');
    }

}
