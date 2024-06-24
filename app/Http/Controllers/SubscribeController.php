<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\contact;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index(Request $request){
        $this->validate($request,[
            'name'=>'required|max:250|min:2',
            'email'=>'required|max:250|min:2|email',
            'number'=>'required|max:12',
            'subject'=>'required|max:250|min:1',
            'body'=>'required|max:2500|min:1',
        ]);


            $message=new contact();
            $message->name=$request->name;
            $message->email=$request->email;
            $message->number=$request->number;
            $message->subject=$request->subject;
            $message->body=$request->body;



            $message->save();
            return redirect()->back()->with('message', 'We Have recieved Your message, We Will response You As Soon As Possible.');
        }

        // admin side

        public function show(){
            $data['messages']=contact::all();
            $data['chats'] = (new ChatController)->chatMac();
            return view('admin/inbox',$data);
        }

        public function delete($id){
            $messages=contact::find($id);
            $messages->delete();
            return redirect()->back();
        }


}
