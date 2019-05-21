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
        $category = new Category;
        $category->cate_name = $req->name;
        $category->cate_slug = str_slug($req->name);
        $category->save();
    }

    public function getEditCate($id)
    {
        $data['cate'] = Category::find($id);
        return view('admin.popup_edit_category', $data);
    }

    public function postEditCate(EditCateRequest $req, $id)
    {
        $category = Category::find($id);
        $category->cate_name = $req->name;
        $category->cate_slug = str_slug($req->name);
        $category->save();
    }

    public function getDeleteCate()
    {
        $selected = $req->selected;
        if($selected != null){
            foreach ($selected as $key => $value) {
                Category::destroy($value);
            }
        }
    }
}