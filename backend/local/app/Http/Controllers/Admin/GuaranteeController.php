<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductOptions;
use App\Models\Orders;
use App\Models\OrdersDetail;
use DB;


class GuaranteeController extends Controller
{
    public function getGuarantee()
    {   
        $data['list_guar'] = DB::table('guarantee')
                            //->join('orders','guarantee.gtd_orders','orders.order_id')
                            //->join('customer','orders.order_cus','customer.cus_id')
                            ->join('product','guarantee.gtd_prod','product.prod_id')
                            ->get();
        // $data['list_order'] = Order::where();
        // $data['list_prod'] = Product::all();
        // $data['list_prod'] = Product::all();
        return view('admin.list_guarantee',$data);
    }

    public function getViewGuar($id)
    {
        $data['guar'] = DB::table('guarantee')
                ->where('gtd_id',$id)
                ->join('orders','guarantee.gtd_orders','ordes.order_id')
                ->join('product','guarantee.gtd_prod','product.prod_id')
                ->get();

        return view('admin.popup_view_guarantee',$data);
    }

    public function postAddProd(Request $req)
    {
        
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
        $product->prod_detail = $req->detail;
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