<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductImage;
use App\Models\ProductOptions;
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
        
        $data['list_options'] = ProductOptions::where('propt_prod',$id)
                            ->get();

        return view('admin.popup_view_product',$data);
    }

    public function postAddProd(Request $req)
    {
        $dataPoster = $req->file('poster');
        $product = new Product;
        $product->prod_name = $req->name;
        $product->prod_slug = str_slug($req->name);
        $product->prod_cate = $req->cate;
        $product->prod_brand = $req->brand;
        $product->prod_detail = $req->detail;
        $product->prod_warranty_period = $req->warranty_period;
        $product->prod_poster = '';
        if(!empty($dataPoster)){
            $posterName = $dataPoster->getClientOriginalName();
            $product->prod_poster = $posterName;
            $dataPoster->storeAs('images/product/',$posterName);
        }
        $product->prod_status = 0;
        $product->save();

        $dataImg = $req->file('product_image');
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

        $dataOptions = $req->option;
        
        if(!empty($dataOptions)){
            foreach ($dataOptions as $key => $value) {
                $options = new ProductOptions;
                $options->propt_prod =  $product->prod_id;
                $options->propt_color = mb_convert_case($value['color'], MB_CASE_TITLE, 'UTF-8');
                $options->propt_ram = $value['ram'];
                $options->propt_rom = mb_strtolower($value['rom'], 'UTF-8');
                $options->propt_price = $value['price'];
                $options->save();
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

        $data['prod_options'] = ProductOptions::where('propt_prod',$id)
                            ->get();

        $data['list_cate'] = Category::all();
        $data['list_brand'] = Brand::all();
        
        return view('admin.popup_edit_product', $data);
    }

    public function postEditProd($id, Request $req)
    {
        $dataPoster = $req->file('poster');

        $product = Product::find($id);

        $product->prod_name = $req->name;
        $product->prod_slug = str_slug($req->name);
        $product->prod_cate = $req->cate;
        $product->prod_brand = $req->brand;
        $product->prod_warranty_period = $req->warranty_period;
        $product->prod_detail = $req->detail;
        $product->prod_new = $req->prod_new;
        if(!empty($dataPoster)){
            $posterName = $dataPoster->getClientOriginalName();
            $product->prod_poster = $posterName;
            $dataPoster->storeAs('images/product/',$posterName);
        }
        $product->prod_status = $req->status;
        $product->save();

        $imgRemove = $req->ImageRemove;
        if(!empty($imgRemove)){
            foreach ($imgRemove as $key => $value) {
                ProductImage::destroy($value);
            }
        }

        $optionRemove = $req->OptionRemove;
        if(!empty($optionRemove)){
            foreach ($optionRemove as $key => $value) {
                ProductOptions::destroy($value);
            }
        }

        $imgEdit = $req->file('product_image_edit');
        if(!empty($imgEdit)){
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

        $dataOptionsEdit= $req->option_edit;
        if(!empty($dataOptionsEdit)){
            foreach ($dataOptionsEdit as $key => $value) {
                $options = ProductOptions::find($key);
                $options->propt_color = mb_convert_case($value['color'], MB_CASE_TITLE, 'UTF-8');
                $options->propt_ram = $value['ram'];
                $options->propt_rom = mb_strtolower($value['rom'], 'UTF-8');
                $options->propt_price = $value['price'];
                $options->save();
            }
        }

        $dataOptionsAdd = $req->option_add;
        if(!empty($dataOptionsAdd)){
            foreach ($dataOptionsAdd as $key => $value) {
                $options = new ProductOptions;
                $options->propt_prod =  $id;
                $options->propt_color = mb_convert_case($value['color'], MB_CASE_TITLE, 'UTF-8');
                $options->propt_ram = $value['ram'];
                $options->propt_rom = mb_strtolower($value['rom'], 'UTF-8');
                $options->propt_price = $value['price'];
                $options->save();
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