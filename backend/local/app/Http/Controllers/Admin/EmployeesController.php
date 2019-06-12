<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employees;

class EmployeesController extends Controller
{
    public function getEmpl()
    { 
        $data['list_empl'] = Employees::all();
        return view('admin.list_employees',$data);
    }

    public function postAddEmpl(Request $req)
    {
        $empl = new Employees;
        $empl->empl_name = $req->name;
        $empl->empl_sex = $req->gender;
        $empl->empl_email = $req->email;
        $empl->empl_phone = $req->phone;
        $empl->empl_address = $req->address;
        $empl->empl_birthday = date_format(date_create($req->birthday),"Y/m/d");
        $empl->empl_identity_card = $req->identityCard;
        $empl->empl_start_date = date_format(date_create($req->start_date),"Y/m/d");
        $empl->empl_basic_salary = $req->salary;
        $empl->empl_status = 0;

        $dataAvatar = $req->file('avatar');
        $empl->empl_avatar = '';
        if(!empty($dataAvatar)){
            $avatarName = $dataAvatar->getClientOriginalName();
            $empl->empl_avatar = $avatarName;
            $dataAvatar->storeAs('images/employees/',$avatarName);
        }

        $empl->save();
    }

    public function getViewEmpl($id)
    {
        $data['empl'] = Employees::find($id);
        return view('admin.popup_view_empl', $data);
    }

    public function getEditEmpl($id)
    {
        $data['empl'] = Employees::find($id);
        return view('admin.popup_edit_empl', $data);
    }

    public function postEditEmpl($id, Request $req)
    {
        $empl = Employees::find($id);
        $empl->empl_name = $req->name;
        $empl->empl_sex = $req->gender;
        $empl->empl_email = $req->email;
        $empl->empl_phone = $req->phone;
        $empl->empl_address = $req->address;
        $empl->empl_birthday = date_format(date_create($req->birthday),"Y/m/d");
        $empl->empl_identity_card = $req->identityCard;
        $empl->empl_start_date = date_format(date_create($req->start_date),"Y/m/d");
        $empl->empl_basic_salary = $req->salary;
        $empl->empl_status = $req->status;

        $dataAvatar = $req->file('avatar');
        if(!empty($dataAvatar)){
            $avatarName = $dataAvatar->getClientOriginalName();
            $empl->empl_avatar = $avatarName;
            $dataAvatar->storeAs('images/employees/',$avatarName);
        }
        
        $empl->save();
    }

    public function getDeleteEmpl(Request $req)
    {
        $selected = $req->selected;
        if($selected != null){
            foreach ($selected as $key => $value) {
                Employees::destroy($value);
            }
        }
    }
}