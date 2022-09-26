<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
}
