<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function index()
    {
        $data['chats'] = Chat::orderBy('id', 'desc')->get();
        return view('admin.chats', $data);
    }

    public function user_index()
    {
        $data['chats'] = Chat::orderBy('id', 'desc')->get();
        return view('chats.index', $data);
    }



    public function search(Request $request)
    {
    $request->validate([
        'keyword' => 'required'
    ]);
    $keyword = $request->get('keyword');
    //single keyword search - start
    $chats = Chat::where('guests_id', 'like', '%'.$keyword.'%')
    ->orWhere('users_id', 'like', '%'.$keyword.'%')
    ->orWhere('sender_type', 'like', '%'.$keyword.'%')
    ->orWhere('receiver_type', 'like', '%'.$keyword.'%')
    ->orWhere('message', 'like', '%'.$keyword.'%')
    ->get();
    $chats = Chat::paginate(5); 
    // single keyword search - end
    return view('chats.index', compact('chats'));      
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chats.create');
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
            'message' => ['required', 'string', 'max:500'],
        
        ]);
        $chat = new Chat;
        $chat->guests_id = $request->guests_id;
        $chat->users_id = $request->users_id;
        $chat->sender_type = $request->sender_type;
        $chat->receiver_type = $request->receiver_type;
        $chat->message = $request->message;
        $chat->save();
        return redirect()->route('admin.chats')
            ->with('success', 'chat has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat  $chat)
    {
        return view('chats.show', compact('chat'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat  $chat)
    {
        return view('chats.edit', compact('chat'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'message' => ['required', 'string', 'max:500'],
        
        ]);
        $chat = Chat::find($id);
        $chat->guests_id = $request->guests_id;
        $chat->users_id = $request->users_id;
        $chat->sender_type = $request->sender_type;
        $chat->receiver_type = $request->receiver_type;
        $chat->message = $request->message;
        $chat->save();
        return redirect()->route('admin.chats')
            ->with('success', 'chat Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
    
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat  $chat)
    {
        $chat->delete();
        return redirect()->route('admin.chats')
            ->with('success', 'chat has been deleted successfully');
    }
}
