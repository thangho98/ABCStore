<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function getCate()
    {
        $data['list_cate'] = Category::all();
        return view('admin.list_category',$data);
    }

    public function postAddCate(AddCateRequest $req)
    {
        $dataIcon = $req->file('icon');
        $category = new Category;
        $category->cate_name = $req->name;
        $category->cate_slug = str_slug($req->name);
        $category->cate_icon = '';
        if(!empty($dataIcon)){
            $iconName = $dataIcon->getClientOriginalName();
            $category->cate_icon = $iconName;
            $dataIcon->storeAs('images/category/',$iconName);
        }
        $category->save();
    }

    public function getEditCate($id)
    {
        $data['cate'] = Category::find($id);
        return view('admin.popup_edit_category', $data);
    }

    public function postEditCate(EditCateRequest $req, $id)
    {
        $dataIcon = $req->file('icon');
        $category = Category::find($id);
        $category->cate_name = $req->name;
        $category->cate_slug = str_slug($req->name);

        //dd($dataIcon);

        if(!empty($dataIcon)){
            $iconName = $dataIcon->getClientOriginalName();
            $category->cate_icon = $iconName;
            $dataIcon->storeAs('images/category/',$iconName);
        }

        $category->save();
    }

    public function getDeleteCate(Request $req)
    {
        $selected = $req->selected;
        if($selected != null){
            foreach ($selected as $key => $value) {
                Category::destroy($value);
            }
        }
    }
}