<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions;
use App\Models\ProductOptions;
use App\Models\Product;

use DB;
use Session;

class PromotionController extends Controller
{
    public function getPromotion()
    { 
        $data['list_promotion'] = DB::table('promotion')
                                    ->join('product_options','promotion.prom_propt','product_options.propt_id')
                                    ->join('product','product_options.propt_prod','product.prod_id')
                                    ->get();
        return view('admin.list_promotion',$data);
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