<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function getProv()
    {
        $data['list_prov'] = Provider::all();
        return view('admin.list_provider',$data);
    }

    public function postAddProv(Request $req)
    {
        $provider = new Provider;
        $provider->prov_name = $req->name;
        $provider->prov_email = $req->email;
        $provider->prov_fax = $req->fax;
        $provider->prov_phone = $req->phone;
        $provider->prov_address = $req->address;
        $provider->prov_desc = $req->description;
        $provider->save();
    }

    public function getEditProv($id)
    {
        $data['prov'] = Provider::find($id);
        return view('admin.popup_edit_provider', $data);
    }

    public function postEditProv(Request $req, $id)
    {
        $provider = Provider::find($id);
        $provider->prov_name = $req->name;
        $provider->prov_email = $req->email;
        $provider->prov_fax = $req->fax;
        $provider->prov_phone = $req->phone;
        $provider->prov_address = $req->address;
        $provider->prov_desc = $req->description;
        $provider->save();
    }

    public function getDeleteProv()
    {
        $selected = $req->selected;
        if($selected != null){
            foreach ($selected as $key => $value) {
                Provider::destroy($value);
            }
        }
    }
}