<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductImage;
use DB;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getProd()
    {   
        $data['list_prod'] = DB::table('product')
                            ->join('category','product.prod_cate','category.cate_id')
                            ->join('brand','product.prod_brand','brand.brand_id')
                            ->get();
        $data['list_cate'] = Category::all();
        $data['list_brand'] = Brand::all();
        return view('admin.list_product',$data);
    }

    public function getViewProd($id)
    {
        $data['prod'] = DB::table('product')
                ->where('prod_id',$id)
                ->join('category','product.prod_cate','category.cate_id')
                ->join('brand','product.prod_brand','brand.brand_id')
                ->first();

        $data['prod_imgs'] = ProductImage::where('pimg_prod',$id)
                            ->get();

        return view('admin.popup_view_product',$data);
    }

    public function postAddProd(Request $req)
    {

        $dataImg = $req->file('product_image');

        $product = new Product;
        $product->prod_name = $req->name;
        $product->prod_slug = str_slug($req->name);
        $product->prod_cate = $req->cate;
        $product->prod_brand = $req->brand;
        $product->prod_unit_price = $req->price;
        $product->prod_detail = $req->detail;
        $product->prod_color = $req->color;
        $product->prod_memory = $req->memory.' '.$req->memory_type;
        $product->prod_status = 0;
        $product->save();

        $product = Product::where('prod_name',$req->name)
                            ->where('prod_color',$req->color)
                            ->where('prod_memory',$req->memory.' '.$req->memory_type)
                            ->first();

        if(!empty($dataImg)){
            foreach ($dataImg as $key => $value) {
                $filename = $value['image']->getClientOriginalName();
                $img = new ProductImage;
                $img->pimg_prod = $product->prod_id;
                $img->pimg_name = $filename;
                $img->save();
                $value['image']->storeAs('images/product/',$filename);
            }
        }
    }

    public function getEditProd($id)
    {
        $data['prod'] = DB::table('product')
                ->where('prod_id',$id)
                ->join('category','product.prod_cate','category.cate_id')
                ->join('brand','product.prod_brand','brand.brand_id')
                ->first();

        $data['prod_imgs'] = ProductImage::where('pimg_prod',$id)
                            ->get();

        $data['list_cate'] = Category::all();
        $data['list_brand'] = Brand::all();
        
        return view('admin.popup_edit_product', $data);
    }

    public function postEditProd($id, Request $req)
    {
        $product = Product::find($id);
        $product->prod_name = $req->name;
        $product->prod_slug = str_slug($req->name);
        $product->prod_cate = $req->cate;
        $product->prod_brand = $req->brand;
        $product->prod_unit_price = $req->price;
        $product->prod_detail = $req->detail;
        $product->prod_color = $req->color;
        $product->prod_memory = $req->memory.' '.$req->memory_type;
        $product->prod_status = $req->status;
        $product->save();

        $imgRemove = $req->ImageRemove;
        if(!empty($imgRemove)){
            foreach ($imgRemove as $key => $value) {
                ProductImage::destroy($value);
            }
        }

        $imgEdit = $req->file('product_add_image');
        if(!empty($ImageEdit)){
            foreach ($imgEdit as $key => $value) {
                $filename = $value['image']->getClientOriginalName();
                $img = ProductImage::find($key);
                $img->pimg_name = $filename;
                $img->save();
                $value['image']->storeAs('images/product/',$filename);
            }
        }

        $dataImg = $req->file('product_add_image');
        if(!empty($dataImg)){
            foreach ($dataImg as $key => $value) {
                $filename = $value['image']->getClientOriginalName();
                $img = new ProductImage;
                $img->pimg_prod = $id;
                $img->pimg_name = $filename;
                $img->save();
                $value['image']->storeAs('images/product/',$filename);
            }
        }


    }

    public function getDeleteProd(Request $req)
    {
        $selected = $req->selected;
        if($selected != null){
            foreach ($selected as $key => $value) {
                Product::destroy($value);
            }
        }
    }
}