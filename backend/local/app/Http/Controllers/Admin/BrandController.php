<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\EditBrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function getBrand()
    { 
        $data['list_brand'] = Brand::all();
        return view('admin.list_brand',$data);
    }

    public function postAddBrand(AddBrandRequest $req)
    {
        $brand = new Brand;
        $brand->brand_name = $req->name;
        $brand->brand_slug = str_slug($req->name);
        $brand->brand_desc = $req->description;
        if($req->isfamous == 1){
            $brand->brand_isfamous = true;
        }
        else{
            $brand->brand_isfamous = false;
        }
        $brand->save();
    }

    public function getEditBrand($id)
    {
        $data['brand'] = Brand::find($id);
        return view('admin.popup_edit_brand', $data);
    }

    public function postEditBrand($id, EditBrandRequest $req)
    {
        $brand = Brand::find($id);
        $brand->brand_name = $req->name;
        $brand->brand_slug = str_slug($req->name);
        $brand->brand_desc = $req->description;
        if($req->isfamous == 1){
            $brand->brand_isfamous = true;
        }
        else{
            $brand->brand_isfamous = false;
        }
        $brand->save();
    }

    public function getDeleteBrand(Request $req)
    {
        $selected = $req->selected;
        if($selected != null){
            foreach ($selected as $key => $value) {
                Brand::destroy($value);
            }
        }
    }
}