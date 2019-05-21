<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductOptions;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Slide;
use DB;

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
                ->select(DB::raw('prod_id, prod_name, prod_poster'))
                ->orderBy('prod_id','desc')
                ->get();
        }


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

        //dd($data);  

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
                ->join('category','product.prod_cate','category.cate_id')
                ->join('brand','product.prod_brand','brand.brand_id')
                ->select(DB::raw('prod_id, prod_name, prod_poster'))
                ->orderBy('prod_id','desc')
                ->get();
            }
        }       

        return view('abcstore.index', $data);
    }

    public function getProduct($id)
    {
        $data['product'] = Product::find($id);
            
        $data['list_comment'] = Comment::where('cmt_prod',$id)->get();
        $data['list_options'] = ProductOptions::where('propt_prod',$id)->get();

        $data['list_memory'] = ProductOptions::where('propt_prod',$id)
                                ->select(DB::raw(' DISTINCT propt_ram, propt_rom'))
                                ->orderBy('propt_ram','asc')
                                ->orderBy('propt_rom','asc')
                                ->get();

        $data['list_color'] = ProductOptions::where('propt_prod',$id)
                                ->select(DB::raw(' DISTINCT propt_color'))
                                ->get();

        $data['list_image'] = ProductImage::where('pimg_prod',$id)->get();

        $data['list_related'] = Product::where('prod_cate',$data['product']->prod_cate)
                                ->where('prod_brand',$data['product']->prod_brand)
                                ->where('prod_id','<>',$id)
                                ->take(10)
                                ->get();
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

    public function getQuickView($id)
    {
        $data['product'] = DB::table('product')
            ->where('prod_id',$id)
            ->where('cmt_prod',$id)
            ->leftJoin('comment','product.prod_id','comment.cmt_prod')
            ->select(DB::raw('prod_id, prod_name, prod_cate, prod_brand, prod_slug, prod_detail, prod_poster, prod_new, avg(cmt_voted) as cmt_avg_voted'))
            ->groupBy('prod_id','prod_name')
            ->first();
            
        $data['list_comment'] = Comment::where('cmt_prod',$id)->get();
        $data['list_options'] = ProductOptions::where('propt_prod',$id)->get();
        $data['list_image'] = ProductImage::where('pimg_prod',$id)->get();

        return view('abcstore.popup_quickview',$data);
    }

    public function getProductByCategory($id)
    {
        $data['cate'] = Category::find($id);
        $data['productlist'] = Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(8);
        return view('abcstore.category',$data);
    }

    public function getProductBybrand($id)
    {
        $data['cate'] = Category::find($id);
        $data['productlist'] = Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(8);
        return view('abcstore.category',$data);
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
    
    public function getSearch(Request $req)
    {
        $result = $req->result;
        $result = str_replace(' ', '%', $result);
        $data['productlist'] = Product::where('prod_name','like','%'.$result.'%')->orderBy('prod_id','desc')->paginate(8);
        $data['search'] = $req->result;
        return view('abcstore.search',$data);
    }
}