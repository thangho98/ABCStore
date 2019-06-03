<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function getPermission()
    {
        $data['list_permission'] = Permission::all();
                            
        return view('admin.list_permission', $data);
    }
}