<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\User;

class HomeController extends Controller
{
    public function getHome()
    {
        return view('admin.home');
    }

    public function getChangePassword()
    {
        return view('admin.change_password');
    }

    public function postChangePassword(Request $req)
    {
        $user = Session::get('user');
        
        $valid = ['username' => $user->username, 'password' => $req->old_password];
        if(Auth::attempt($valid)){

            $user->password = bcrypt($req->new_password);
            $user->save();
            
            return back()->withInput()->with('success','Thay đổi mật khẩu thành công');
        }
        else{
            return back()->withInput()->with('error','Mật khẩu cũ không chính xác');
        }
    }

    public function returnHome()
    {
        return redirect()->intended('admin/home');
    }

    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->intended('login');
    }
}