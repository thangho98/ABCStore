<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function getHome()
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
        return redirect()->intended('login');
    }
}