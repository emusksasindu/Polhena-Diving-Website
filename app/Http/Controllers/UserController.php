<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','max:16', 'confirmed'],
        ]);
        return $request->type == "U" ? User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type'=> 'U',
            'status'=> 'active',
        ])->with('success', 'user has been created successfully.') :
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type'=> 'A',
            'status'=> 'active',
        ])->with('success', 'user has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User  $user)
    {
        return view('users.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */


    public function updateInfo(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        $user = User::find($request->id);
        if ($request->email != $user->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ]);
            $user->email = $request->email;
        }

        $user->name = $request->name;
        $user->save();
        return redirect()->back()
            ->with('status', 'User has been updated successfully');
    }

    public function updatePwd(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8', 'max:16'],
            'password' => ['required', 'string', 'min:8', 'max:16', 'confirmed'],
        ]);


        $user = User::find($request->id);
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()
                ->with('status', 'Password has been updated successfully');
        }
        return redirect()->back()
            ->with('status', 'current password is invalid!');
    }


    /**
     * Remove the specified resource from storage.

     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User  $user)
    {
        $user->delete();
        return redirect()->route('admin.users')
            ->with('success', 'User has been deleted successfully');
    }

    public function showusers(){
        $users=User::all();

            return view('admin.users',['users'=>$users]);
    }
    // public function deleteuser($id){
    //     $user=User::find($id);
    //     $user->delete();

    //     return redirect()->back();
    // }
    public function edituser($id)
    {
        $user= user::find($id);
        return view('admin.edituser',['user'=>$user]);
    }
    public function userupdate(Request $request){
        $user=user::find($request->id);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->type=$request->type;
        $user->status= $request->status;

        $user->save();
        return redirect()->back()->with('message', 'user Has Been updated Sucessfully !');
    }

    public function profileupdate(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
            $user=user::find($request->id);

            $user->name=$request->name;
            $user->email=$request->email;

            $user->save();
            return redirect()->back()->with('updatemsg', 'Details Has Been updated Sucessfully !');
    }

    public function passwordchange(Request $request){
        $request->validate([
            'password' => ['required', 'string', 'min:8','max:16', 'confirmed'],
        ]);
        $user = user::find(Auth::user()->id);

        if(Hash::check($request->oldpassword, $user->password)){
            if (!Hash::check($request->password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);

                Auth::logout();
            } else {
                return redirect()->back()->with('changepassword', 'Password error !');
            }
        }else{
            return redirect()->back()->with('changepassword', 'Password error !');
        }

        return redirect()->back()->with('changepassword', 'Password has been Changed Successfully');
    }
}
