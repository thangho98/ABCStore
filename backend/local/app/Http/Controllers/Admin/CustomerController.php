<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getCus()
    { 
        $data['list_cus'] = Customer::all();
        return view('admin.list_customer',$data);
    }

    public function getEditCus($id)
    {
        $data['cus'] = Customer::find($id);
        return view('admin.popup_edit_cus', $data);
    }

    public function postEditEmpl($id, Request $req)
    {
        $cus = Customer::find($id);
        $cus->cus_phone = $req->phone;
        $cus->cus_email = $req->email;
        $cus->save();
    }

    public function getDeleteCus(Request $req)
    {
        $selected = $req->selected;
        if($selected != null){
            foreach ($selected as $key => $value) {
                Customer::destroy($value);
            }
        }
    }
}