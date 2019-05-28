<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Permission;
use App\Models\Employees;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function getUsers()
    {
        $data['list_user'] = DB::table('user')
                            ->join('permission','user.perm_id','permission.perm_id')
                            ->join('employees','user.empl_id','employees.empl_id')
                            ->select(DB::raw('username, status, empl_name, perm_name'))
                            ->get();

        $data['list_permission'] = Permission::all();

        $data['list_employees'] = DB::table('employees')
                                ->whereNotIn('empl_id', DB::table('user')->pluck('empl_id'))
                                ->where('empl_status',0)
                                ->get();
                            
        return view('admin.list_user', $data);
    }

    public function postAddUser(Request $req)
    {
        $user = new User;
        $user->username = $req->username;
        $user->empl_id = $req->empl_id;
        $user->perm_id = $req->perm_id;
        $user->password = bcrypt(1);
        $user->status = 0;
        $user->remember_token = $req->_token;
        $user->save();
    }

    public function getEditUser($id)
    {
        $data['user'] = DB::table('user')->where('username',$id)->first();
        $data['list_permission'] = Permission::all();

        $data['employees'] = Employees::where('empl_id', $data['user']->empl_id)
                                ->first();
        
        
        
        return view('admin.popup_edit_user', $data);
    }

    public function postEditUser($id, Request $req)
    {
        $user = User::find($id);
        $user->perm_id = $req->perm_id;
        $user->remember_token = $req->_token;
        $user->save();
    }

    public function getDeleteUser(Request $req)
    {
        $selected = $req->selected;
        if($selected != null){
            foreach ($selected as $key => $value) {
                User::destroy($value);
            }
        }
    }

    public function getResetPassUser(Request $req)
    {
        $user = User::find($req->username);
        if($user->status == 1){
            $user->password = bcrypt(1);
            $user->status = 0;
        }
        $user->save();
    }
}