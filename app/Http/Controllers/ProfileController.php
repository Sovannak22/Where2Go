<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //

    public function editProfile(){
        $user = Auth::user();
        return view('profiles.profile')->with('user',$user);
    }

    public function updateProfile(Request $request){
    
        $data = $this->validate($request,[
            'name' => '',
            'email' => '',
            'phone_number' => '',
            'email' => 'email', 'max:255', 'unique:users',
        ]);

        User::find(Auth::user()->id)->update($data);
        Session::flash('update_profile_success','Update Profile Successfully');
        return back();
    }
    public function changePassword(Request $request){
        $request->validate([
            'current_password' => ['required',new MatchOldPassword],
            'new_password' => 'required|min:6|max:20',
            'confirm_password' => 'required|min:6|max:20|same:new_password'
        ]);
        $password = Hash::make($request->new_password);
        User::find(Auth::user()->id)->update(['password'=>$password]);
        Session::flash('update_profile_success','Password change successfully');
        return back();
    }
}
