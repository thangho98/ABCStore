<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class HomeController extends Controller
{
    public function getHome(Request $request)
    {
        return view('admin.home');
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