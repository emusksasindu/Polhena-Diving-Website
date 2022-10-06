<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
        public function index()
    {
        // $chats = Chat::all();
        $users = Chat::select('user_id')->distinct()->get();

        $chatsData = [];
        $fake = true;
        foreach ($users as $user) {
            $userData = [];
            $userData1 = [];

            $u = Chat::select('sender_type')->distinct()->where('user_id', '=', $user->user_id)->first();
            $sender_type = $u->sender_type;
            if ($sender_type == "U") {
                $unreadChats = Chat::where('user_id', '=', $user->user_id)->where('read_status', '=', 0)->where('sender_type', '=', 'U')->get();
                $userData["name"] = $user->user->name;
                $userData["user_id"] = $user->user_id;
                $userData["user_type"] = "U";
                $userData["unreadChats"] = count($unreadChats);
            } elseif ($sender_type == "G" && $fake == true) {
                $fake = false;
                $guests = Chat::select('guest_id')->distinct()->where('guest_id', '!=', NULL)->get();
                foreach ($guests as $guest) {
                    $unreadChats = Chat::where('guest_id', '=', $guest->guest_id)->where('read_status', '=', 0)->where('sender_type', '=', 'G')->where('guest_id', '!=', NULL)->get();
                    
                    $userData1["name"] = "Guest";
                    $userData1["user_id"] = $guest->guest_id;
                    $userData1["user_type"] = "G";
                    $userData1["unreadChats"] = count($unreadChats);
                    array_push($chatsData, $userData1);
                }
            }
            if ($userData != []) {
                array_push($chatsData, $userData);
            }
        }
        
        return view('admin.chat', ['chats'=>$chatsData]);
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
        // return view('chats.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated['message'] = $request->message;
        $userType = $request->type;
        
        if (Auth::check()) {
            if ($request->type == "A") {
                if (session('chat_user_id')) {
                    $validated['user_id'] = session('chat_user_id');
                    $validated['sender_type'] = "A";
                    $validated['receiver_type'] = $userType;
                } else if(session('chat_guest_id')) {
                    $validated['guest_id'] = session('chat_guest_id');
                    $validated['user_id'] = 1;
                    $validated['sender_type'] = "A";
                    $validated['receiver_type'] = "G";
                }
            } else {
                $validated['user_id'] = Auth::user()->id;
                $validated['sender_type'] = $userType;
                $validated['receiver_type'] = "A";
            }
        } else {
            $last_row = DB::table('chats')->latest("id")->first();
            if (!session('chat_guest_id')) {
                session(['chat_guest_id'=>$last_row->id]);
            }
            if ($request->type == "A") {
                $validated['guest_id'] = session('chat_guest_id');
                $validated['user_id'] = null;
                $validated['sender_type'] = "A";
                $validated['receiver_type'] = $userType;
            } else {
                $validated['guest_id'] = session('chat_guest_id');
                $validated['user_id'] = null;
                $validated['sender_type'] = $userType;
                $validated['receiver_type'] = "A";
            }
        }
        $chat = Chat::create($validated);
        
        $status = "Failed";
        if ($chat) {
            $status = "Success";
        }
        return response()->json($status);
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


    public function user_chat(Request $request) {
        if (Auth::check()) {
            $chats = Chat::where('user_id', '=', Auth::user()->id)->get();
        } else {
            $chats = Chat::where('guest_id', '!=', NULL)->where('guest_id', '=', session('chat_guest_id'))->get();
        }
        return response()->json($chats);
    }

    public function admin_chat(Request $request) {
        if (session('chat_user_id')) {
            $chats = Chat::where('user_id', '=', session('chat_user_id'))->get();
        } elseif (session('chat_guest_id')) {
            $chats = Chat::where('guest_id', '=', session('chat_guest_id'))->get();
        }
        return response()->json($chats);
    }

    public function set_user_session(Request $request) {
        session()->forget('chat_user_id');
        session()->forget('chat_guest_id');
        if ($request->user_type == "U") {
            $res = Chat::where('user_id', '=', $request->user_id)->update(['read_status' => 1]);

            session(['chat_user_id' => $request->user_id]);
            session(['chat_user_name' => $request->user_name]);
        } elseif ($request->user_type == "G") {
            
            $res = Chat::where('guest_id', '=', $request->user_id)->update(['read_status' => 1]);

            session(['chat_guest_id' => $request->user_id]);
            session(['chat_user_name' => "Guest"]);
        }

        
        return back();
    }
    
}
