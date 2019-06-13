<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Models\Employees;

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

        if(Auth::attempt($valid,$remember)){

            $employees = Employees::find(Auth::user()->empl_id);
            Session::put('user',Auth::user());
            Session::put('employees',$employees);

            $perm = Auth::user()->perm_id;

            switch ($perm) {
                case 1:
                    return redirect()->intended('admin/home');
                    break;
                
                case 2:
                    return redirect()->intended('admin/orders');
                    break;
                
                case 3:
                    return redirect()->intended('admin/guarantee');
                    break;

                case 4:
                    return redirect()->intended('admin/invoice');
                    break;
            }  
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