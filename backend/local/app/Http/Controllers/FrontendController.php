<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductOptions;
use App\Models\Promotion;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Slide;
use DB;
use Session;
use Illuminate\Support\Facades\Log;

class FrontendController extends Controller
{
    public function getHome()
    {

        $data['list_slide'] = Slide::where('slide_status', 1)
                            ->orderBy('slide_id', 'desc')->get();

        $data['list_cate'] = Category::orderBy('cate_id','desc')->get();

        $data['list_cate_new'] = DB::table('product')
            ->where('prod_new','1')
            ->where('prod_status','1')
            ->join('category','product.prod_cate','category.cate_id')
            ->select(DB::raw('cate_id, cate_name, cate_slug'))
            ->groupBy('cate_id', 'cate_name')
            ->get();
        
        $list_cate_new = $data['list_cate_new'];
        foreach ($list_cate_new as $key => $value) {
            $nameArr = 'by_cate_'.$value->cate_id;
            $data['list_prod_new'][$nameArr] = DB::table('product')
                ->where('prod_new','1')
                ->where('prod_status','1')
                ->where('cate_id',$value->cate_id)
                ->join('category','product.prod_cate','category.cate_id')
                ->join('product_options','product.prod_id','product_options.propt_prod')
                ->select(DB::raw('prod_id, prod_name, prod_poster, min(propt_price) as prod_price'))
                ->groupBy('prod_id','prod_name')
                ->orderBy('prod_id','desc')
                ->get();
        }
        
        $data['list_prod_new'] = json_encode($data['list_prod_new']);
        $data['list_prod_new'] = json_decode($data['list_prod_new'], true);

        //dd($data);
        
        foreach ($data['list_prod_new'] as $key => $list_prod) {
            foreach ($list_prod as $index => $prod) {
                $prom = DB::table('product_options')
                ->where('prom_status','1')
                ->where('propt_prod',$prod['prod_id'])
                ->join('promotiondetail','product_options.propt_id','promotiondetail.promdt_propt')
                ->join('promotion','promotion.prom_id','promotiondetail.promdt_prom')
                ->select(DB::raw('max(promdt_percent) as promdt_percent, promdt_promotion_price'))
                ->groupBy('propt_prod')
                ->first();
                
                if($prom != null){
                    $data['list_prod_new'][$key][$index]['promdt_promotion_price'] = $prom->promdt_promotion_price;
                    $data['list_prod_new'][$key][$index]['promdt_percent'] =  $prom->promdt_percent;
                }
                else{
                    $data['list_prod_new'][$key][$index]['promdt_promotion_price'] = 0;
                    $data['list_prod_new'][$key][$index]['promdt_percent'] = 0;
                }
            }
        }
        //dd($data);

        $data['list_cate_featured'] = DB::table('product')
            ->where('prod_featured','1')
            ->where('prod_status','1')
            ->where('brand_famous','1')
            ->where('prod_new','0')
            ->join('category','product.prod_cate','category.cate_id')
            ->join('brand','product.prod_brand','brand.brand_id')
            ->select(DB::raw('cate_id, cate_name, cate_slug'))
            ->groupBy('cate_id', 'cate_name')
            ->get();

        $list_cate_featured = $data['list_cate_featured'];
        foreach ($list_cate_featured as $key => $value) {
            $nameCate = 'by_cate_'.$value->cate_id;
            $data['list_brand_featured'][$nameCate] = DB::table('product')
                ->where('prod_featured','1')
                ->where('prod_status','1')
                ->where('brand_famous','1')
                ->where('prod_new','0')
                ->where('prod_cate',$value->cate_id)
                ->join('brand','product.prod_brand','brand.brand_id')
                ->select(DB::raw('brand_id, brand_name, brand_slug'))
                ->groupBy('brand_id','brand_name')
                ->get();
        }

        $list_cate_featured = $data['list_cate_featured'];
        foreach ($list_cate_featured as $key1 => $value1) {
            $nameCate = 'by_cate_'.$value1->cate_id;
            $list_brand_featured = $data['list_brand_featured'][$nameCate];
            foreach ($list_brand_featured as $key2 => $value2) {
                $nameBrand = $nameCate.'_by_brand_'.$value2->brand_id;
                $data['list_prod_featured'][$nameBrand] = DB::table('product')
                ->where('prod_featured','1')
                ->where('prod_status','1')
                ->where('brand_famous','1')
                ->where('prod_new','0')
                ->where('cate_id',$value1->cate_id)
                ->where('brand_id',$value2->brand_id)
                ->join('product_options','product.prod_id','product_options.propt_prod')
                ->join('category','product.prod_cate','category.cate_id')
                ->join('brand','product.prod_brand','brand.brand_id')
                ->select(DB::raw('prod_id, prod_name, prod_poster, min(propt_price) as prod_price'))
                ->orderBy('prod_id','desc')
                ->get();
            }
        }
        
        $data['list_promotion'] = DB::table('product')
            ->join('product_options','product.prod_id','product_options.propt_prod')
            ->join('promotiondetail','product_options.propt_id','promotiondetail.promdt_propt')
            ->join('promotion','promotion.prom_id','promotiondetail.promdt_prom')
            ->where('prod_status','1')
            ->where('prom_status','1')
            ->groupBy('prod_id','prod_name')
            ->distinct('prod_id')
            ->orderBy('prom_id','desc')
            ->get();
        
        //dd($data);
        return view('abcstore.index', $data);
    }

    public function getProduct($id, Request $req)
    {
        $data['product'] = Product::find($id);
            
        $data['list_comment'] = Comment::where('cmt_prod',$id)->get();
        $data['list_options'] = ProductOptions::where('propt_prod',$id)->get();

        $data['list_memory'] = ProductOptions::where('propt_prod',$id)
                                ->select(DB::raw('DISTINCT propt_ram, propt_rom'))
                                ->orderBy('propt_ram','desc')
                                ->orderBy('propt_rom','desc')
                                ->get();

        $data['min_price'] = ProductOptions::where('propt_prod',$id)
                                ->select(DB::raw('min(propt_price) as price'))
                                ->first();
        
        $data['max_price'] = ProductOptions::where('propt_prod',$id)
                                ->select(DB::raw('max(propt_price) as price'))
                                ->first();
        
        if(count($data['list_memory']) > 0){
            $data['list_color'] = ProductOptions::where('propt_prod',$id)
                                ->where('propt_ram',$data['list_memory'][0]->propt_ram)
                                ->where('propt_rom',$data['list_memory'][0]->propt_rom)
                                ->select(DB::raw('DISTINCT propt_color'))
                                ->get();
        }
        
        $data['list_image'] = ProductImage::where('pimg_prod',$id)->get();

        $data['list_related'] = DB::table('product')
            ->join('product_options','product.prod_id','product_options.propt_prod')
            ->where('prod_cate',$data['product']->prod_cate)
            ->where('prod_brand',$data['product']->prod_brand)
            ->where('prod_id','<>',$id)
            ->select(DB::raw('prod_id, prod_name, prod_poster, prod_new, min(propt_price) as prod_price'))
            ->groupBy('prod_id','prod_name')
            ->orderBy('prod_id','desc')
            ->take(10)
            ->get();
        
        $data['list_related'] = json_encode($data['list_related']);
        $data['list_related'] = json_decode($data['list_related'], true);
        
        foreach ($data['list_related']  as $index => $prod) {
            $prom = DB::table('product_options')
                ->where('prom_status','1')
                ->where('propt_prod',$prod['prod_id'])
                ->join('promotiondetail','product_options.propt_id','promotiondetail.promdt_propt')
                ->join('promotion','promotion.prom_id','promotiondetail.promdt_prom')
                ->select(DB::raw('max(promdt_percent) as promdt_percent, promdt_promotion_price'))
                ->groupBy('propt_prod')
                ->first();
            
            if($prom != null){
                $data['list_related'][$index]['promdt_promotion_price'] = $prom->promdt_promotion_price;
                $data['list_related'][$index]['promdt_percent'] =  $prom->promdt_percent;
            }
            else{
                $data['list_related'][$index]['promdt_promotion_price'] = 0;
                $data['list_related'][$index]['promdt_percent'] = 0;
            }
        }

        $sum = 0;
        foreach ($data['list_comment'] as $key => $value) {
            $sum += $value->cmt_voted;
        }
        if(count($data['list_comment']) == 0)
            $data['avg_voted'] = 0;
        else
            $data['avg_voted'] = $sum/count($data['list_comment']);
        
        return view('abcstore.product',$data);
    }


    public function postComment(Request $req, $id)
    {
        $comment = new Comment;
        $comment->cmt_name = $req->name;
        $comment->cmt_email = $req->email;
        $comment->cmt_content = $req->content;
        $comment->cmt_voted = $req->voted;
        $comment->cmt_prod = $id;
        $comment->save();
        return back();
    }
    
    public function getOptionsColorProduct($id, Request $req)
    {
        $data['min_price'] = ProductOptions::where('propt_prod',$id)
                                ->select(DB::raw('min(propt_price) as price'))
                                ->first();
        
        $data['max_price'] = ProductOptions::where('propt_prod',$id)
                                ->select(DB::raw('max(propt_price) as price'))
                                ->first();
        $data['list_color'] = ProductOptions::where('propt_prod',$id)
                            ->where('propt_ram',$req->ram)
                            ->where('propt_rom',$req->rom)
                            ->select(DB::raw('DISTINCT propt_color'))
                            ->get();
        return json_encode($data);
    }

    public function getOptionsProduct($id, Request $req)
    {
        $data['options'] = ProductOptions::where('propt_prod',$id)
                            ->where('propt_ram',$req->ram)
                            ->where('propt_rom',$req->rom)
                            ->where('propt_color',$req->color)
                            ->first();

        $data['promotion'] = DB::table('promotiondetail')
                            ->join('promotion','promotion.prom_id','promotiondetail.promdt_prom')
                            ->where('prom_status',1)
                            ->where('promdt_propt',$data['options']->propt_id)
                            ->orderBy('prom_id','desc')
                            ->first();
                            
        return json_encode($data);
    }


    public function getShop()
    {
        $data['list_cate'] = Category::all();

        $data['list_brand'] = Brand::all();

        $data['list_new_product'] = DB::table('product')->where('prod_new','1')
            ->where('prod_status','1')
            ->join('product_options','product.prod_id','product_options.propt_prod')
            ->select(DB::raw('prod_id, prod_name, prod_poster, min(propt_price) as prod_price'))
            ->groupBy('prod_id')
            ->orderBy('prod_id','desc')
            ->take(4)
            ->get();
        
        $data['list_new_product'] = json_encode($data['list_new_product']);
        $data['list_new_product'] = json_decode($data['list_new_product'], true);
        
        foreach ($data['list_new_product']  as $index => $prod) {
            $prom = DB::table('product_options')
                ->where('prom_status','1')
                ->where('propt_prod',$prod['prod_id'])
                ->join('promotiondetail','product_options.propt_id','promotiondetail.promdt_propt')
                ->join('promotion','promotion.prom_id','promotiondetail.promdt_prom')
                ->select(DB::raw('max(promdt_percent) as promdt_percent, promdt_promotion_price'))
                ->groupBy('propt_prod')
                ->first();
            
            if($prom != null){
                $data['list_new_product'][$index]['promdt_promotion_price'] = $prom->promdt_promotion_price;
                $data['list_new_product'][$index]['promdt_percent'] =  $prom->promdt_percent;
            }
            else{
                $data['list_new_product'][$index]['promdt_promotion_price'] = 0;
                $data['list_new_product'][$index]['promdt_percent'] = 0;
            }
        }

        
        $data['list_product'] = DB::table('product')->where('prod_status','1')
            ->join('product_options','product.prod_id','product_options.propt_prod')
            ->select(DB::raw('prod_id, prod_name, prod_new, prod_detail, prod_warranty_period, prod_poster, min(propt_price) as prod_price'))
            ->groupBy('prod_id')
            ->orderBy('prod_id','desc')
            ->get();

        $data['list_product'] = json_encode($data['list_product']);
        $data['list_product'] = json_decode($data['list_product'], true);
        
        foreach ($data['list_product']  as $index => $prod) {
            $prom = DB::table('product_options')
                ->where('prom_status','1')
                ->where('propt_prod',$prod['prod_id'])
                ->join('promotiondetail','product_options.propt_id','promotiondetail.promdt_propt')
                ->join('promotion','promotion.prom_id','promotiondetail.promdt_prom')
                ->select(DB::raw('max(promdt_percent) as promdt_percent, promdt_promotion_price'))
                ->groupBy('propt_prod')
                ->first();
            
            if($prom != null){
                $data['list_product'][$index]['promdt_promotion_price'] = $prom->promdt_promotion_price;
                $data['list_product'][$index]['promdt_percent'] =  $prom->promdt_percent;
            }
            else{
                $data['list_product'][$index]['promdt_promotion_price'] = 0;
                $data['list_product'][$index]['promdt_percent'] = 0;
            }
        }    
        
        $data['list_ram'] = DB::table('product_options')
            ->where('prod_status','1')
            ->join('product','product_options.propt_prod','product.prod_id')
            ->join('category','product.prod_cate','category.cate_id')
            ->select(DB::raw('DISTINCT propt_ram'))
            ->orderBy('propt_ram','desc')
            ->get();


        $data['list_rom'] = DB::table('product_options')
            ->where('prod_status','1')
            ->join('product','product_options.propt_prod','product.prod_id')
            ->join('category','product.prod_cate','category.cate_id')
            ->select(DB::raw('DISTINCT propt_rom'))
            ->orderBy('propt_rom','desc')
            ->get();
        
        
        //dd($data);

        return view('abcstore.shop',$data);
    }

    public function getSearch(Request $req)
    {
        $data['list_new_product'] = DB::table('product')->where('prod_new','1')
            ->where('prod_status','1')
            ->join('product_options','product.prod_id','product_options.propt_prod')
            ->select(DB::raw('prod_id, prod_name, prod_poster, min(propt_price) as prod_price'))
            ->groupBy('prod_id')
            ->orderBy('prod_id','desc')
            ->take(4)
            ->get();
        
        $data['list_new_product'] = json_encode($data['list_new_product']);
        $data['list_new_product'] = json_decode($data['list_new_product'], true);
            
        foreach ($data['list_new_product']  as $index => $prod) {
            $prom = DB::table('product_options')
                ->where('prom_status','1')
                ->where('propt_prod',$prod['prod_id'])
                ->join('promotiondetail','product_options.propt_id','promotiondetail.promdt_propt')
                ->join('promotion','promotion.prom_id','promotiondetail.promdt_prom')
                ->select(DB::raw('max(promdt_percent) as promdt_percent, promdt_promotion_price'))
                ->groupBy('propt_prod')
                ->first();
            
            if($prom != null){
                $data['list_new_product'][$index]['promdt_promotion_price'] = $prom->promdt_promotion_price;
                $data['list_new_product'][$index]['promdt_percent'] =  $prom->promdt_percent;
            }
            else{
                $data['list_new_product'][$index]['promdt_promotion_price'] = 0;
                $data['list_new_product'][$index]['promdt_percent'] = 0;
            }
        }
        
        $queryListProduct = DB::table('product')->where('prod_status','1')
            ->join('product_options','product.prod_id','product_options.propt_prod')
            ->select(DB::raw('prod_id, prod_name, prod_new, prod_detail, prod_warranty_period, prod_poster, min(propt_price) as prod_price'))
            ->groupBy('prod_id')
            ->orderBy('prod_id','desc');
        
        
        if($req->category == "all"){
            $data['list_cate'] = Category::all();
        }else{
            $data['list_cate'] = Category::where('cate_id',$req->category)->get();
            $queryListProduct->where('prod_cate',$req->category);
        }

        $result = $req->search;
        $result = str_replace(' ', '%', $result);
        $queryListProduct->where('prod_name','like','%'.$result.'%');
        $data['search'] = $req->search;

        $data['list_product'] = $queryListProduct->get();
        $data['list_product'] = json_encode($data['list_product']);
        $data['list_product'] = json_decode($data['list_product'], true);
        
        foreach ($data['list_product']  as $index => $prod) {
            $prom = DB::table('product_options')
                ->where('prom_status','1')
                ->where('propt_prod',$prod['prod_id'])
                ->join('promotiondetail','product_options.propt_id','promotiondetail.promdt_propt')
                ->join('promotion','promotion.prom_id','promotiondetail.promdt_prom')
                ->select(DB::raw('max(promdt_percent) as promdt_percent, promdt_promotion_price'))
                ->groupBy('propt_prod')
                ->first();
            
            if($prom != null){
                $data['list_product'][$index]['promdt_promotion_price'] = $prom->promdt_promotion_price;
                $data['list_product'][$index]['promdt_percent'] =  $prom->promdt_percent;
            }
            else{
                $data['list_product'][$index]['promdt_promotion_price'] = 0;
                $data['list_product'][$index]['promdt_percent'] = 0;
            }
        }
        
        $queryListBrand = DB::table('brand')
            ->join('product','brand.brand_id','product.prod_brand');

        $queryListRam = DB::table('product_options')
            ->where('prod_status','1')
            ->join('product','product_options.propt_prod','product.prod_id')
            ->join('category','product.prod_cate','category.cate_id')
            ->select(DB::raw('DISTINCT propt_ram'))
            ->orderBy('propt_ram','desc');


        $queryListRom = DB::table('product_options')
            ->where('prod_status','1')
            ->join('product','product_options.propt_prod','product.prod_id')
            ->join('category','product.prod_cate','category.cate_id')
            ->select(DB::raw('DISTINCT propt_rom'))
            ->orderBy('propt_rom','desc');
        
        $products = $queryListProduct->get();
        

        for ($i = 0; $i < count($products); $i++) { 
            if($i == 0){
                $queryListBrand->where('prod_id', $products[$i]->prod_id);
                $queryListRam->where('prod_id', $products[$i]->prod_id);
                $queryListRom->where('prod_id', $products[$i]->prod_id);
            }
            else{
                $queryListBrand->orWhere('prod_id', $products[$i]->prod_id);
                $queryListRam->orWhere('prod_id', $products[$i]->prod_id);
                $queryListRom->orWhere('prod_id', $products[$i]->prod_id);
            }
        }

        $data['list_ram'] = $queryListRam->get();
        $data['list_rom'] = $queryListRom->get();
        $data['list_brand'] = $queryListBrand->get();

        return view('abcstore.search',$data);
    }

    public function getListProduct(Request $req)
    {
        $queryListProduct = DB::table('product')->where('prod_status','1')
                                        ->join('product_options','product.prod_id','product_options.propt_prod')
                                        ->select(DB::raw('prod_id, prod_name, prod_new, prod_detail, prod_warranty_period, prod_poster, min(propt_price) as prod_price'))
                                        ->groupBy('prod_id');
        
        if($req->search){
            $result = $req->search;
            $result = str_replace(' ', '%', $result);
            $queryListProduct->where('prod_name','like','%'.$result.'%');
        }

        if($req->orderby != "default"){
            $arr = explode('-',$req->orderby);
            $queryListProduct->orderBy($arr[0],$arr[1]);
            
        }else{
            $queryListProduct->orderBy('prod_id','desc');
        }
        
        $brand = $req->brand_id;
        if($brand){
            for ($i = 0; $i < count($brand); $i++) { 
                if($i == 0){
                    $queryListProduct->where('prod_brand',$brand[$i]);
                }
                else{
                    $queryListProduct->orWhere('prod_brand',$brand[$i]);
                }
            }
        }

        $cate = $req->cate_id;
        if($cate){
            for ($i = 0; $i < count($cate); $i++) { 
                if($i == 0){
                    $queryListProduct->where('prod_cate',$cate[$i]);
                }
                else{
                    $queryListProduct->orWhere('prod_cate',$cate[$i]);
                }
            }
        }

        $ram = $req->ram;
        if($ram){
            for ($i = 0; $i < count($ram); $i++) { 
                if($i == 0){
                    $queryListProduct->where('propt_ram',$ram[$i]);
                }
                else{
                    $queryListProduct->orWhere('propt_ram',$ram[$i]);
                }
            }
        }

        $rom = $req->rom;
        if($rom){
            for ($i = 0; $i < count($rom); $i++) { 
                if($i == 0){
                    $queryListProduct->where('propt_rom',$rom[$i]);
                }
                else{
                    $queryListProduct->orWhere('propt_rom',$rom[$i]);
                }
            }
        }

        $data['list_product'] = $queryListProduct->get();
        $data['list_product'] = json_encode($data['list_product']);
        $data['list_product'] = json_decode($data['list_product'], true);
        
        foreach ($data['list_product']  as $index => $prod) {
            $prom = DB::table('product_options')
                ->where('prom_status','1')
                ->where('propt_prod',$prod['prod_id'])
                ->join('promotiondetail','product_options.propt_id','promotiondetail.promdt_propt')
                ->join('promotion','promotion.prom_id','promotiondetail.promdt_prom')
                ->select(DB::raw('max(promdt_percent) as promdt_percent, promdt_promotion_price'))
                ->groupBy('propt_prod')
                ->first();
            
            if($prom != null){
                $data['list_product'][$index]['promdt_promotion_price'] = $prom->promdt_promotion_price;
                $data['list_product'][$index]['promdt_percent'] =  $prom->promdt_percent;
            }
            else{
                $data['list_product'][$index]['promdt_promotion_price'] = 0;
                $data['list_product'][$index]['promdt_percent'] = 0;
            }
        }

        //dd($data);

        return view('abcstore.list_product',$data);
    }
}