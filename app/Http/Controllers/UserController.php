<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $name = $request->name;
        $email = $request->email;
        $tel = $request->phone_number;
        $user_type = $request->user_type;

        $users = User::orderBy('name','asc');
        if(!empty($name)){
            $users= $users->where('name','like',"%$name%");
        }
        if (!empty($email)){
            $users = $users->where('email',$email);
        }
        if (!empty($tel)){
            $users = $users->where('phone_number',$tel);
        }
        if (!empty($user_type)){
            $users = $users->where('user_type',$user_type);
        }
        $users = $users->paginate(10);
        $user_types = UserType::all();
        return view('users.index',compact('users','user_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    //     return view('users.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => '',
            'user_type' => ''
            
        ]);

        $user = new User($validate);
        $user->save();
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    //     $user = User::find($id);

    //     return view('users.edit',compact('user'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $validate = $request->validate([
    //         'user' => 'required',
    //         'description' => ''
    //     ]);
    //     User::where('id',$id)->update($validate);
    //     Session::flash('edit_user','User Saved Successfully');
    //     return redirect(url('users'));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json();

    }

}
