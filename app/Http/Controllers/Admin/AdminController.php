<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin.home');
    }
    public function logout()
    {
        Auth::logout();
        
 $notification = array('messege'=>'You are successfully Logged Out','alert-type'=>'success');
 return redirect()->route('admin.login')->with($notification);
    }


    public function password_change()
    {
       return view('admin.password.passwordChange');
    }

    public function password_update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'old_password'=>'required',
            'password'=>'required|confirmed',
            
        ]);
        $current_password = Auth::user()->password;
        $old_password = $request->old_password;
        if(Hash::check($old_password,$current_password))
        {

            Auth::user()->password = Hash::make($request->password);
            Auth::user()->save();
            Auth::logout();
        $notification = array('messege'=>'Password Changed succefully','alert-type'=>'success');
        return redirect()->route('admin.login')->with($notification);
        }
        else
        {
            $notification = array('messege'=>'Old password doesnot match','alert-type'=>'danger');
            return redirect()->back()->with($notification);
        }

        // $notification = array('messege'=>'You are successfully Logged Out','alert-type'=>'success');
        // return redirect()->route('admin.login')->with($notification);
    }
}
