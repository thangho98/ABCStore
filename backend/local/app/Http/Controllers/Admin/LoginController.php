<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.signin');
    }

    public function postLogin(Request $req)
    {
        $valid = ['username' => $req->username, 'password' => $req->password];
        if($req->remember == 1){
            $remember = true;
        }
        else{
            $remember = false;
        }
        if(Auth::attempt($valid, $remember)){
            
            return redirect()->intended('admin/home');
        }
        else{
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu chưa đúng');
        }
    }

    public function getReminder()
    {
        return view('admin.reminder');
    }

    public function postReminder(Request $req)
    {
        return redirect()->intended('/login');
    }
}