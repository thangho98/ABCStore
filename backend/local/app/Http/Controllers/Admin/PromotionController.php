<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Promotion;
use App\Models\Product;
use App\Models\ProductOptions;
use DB;
use Cart;
use Auth;

class PromotionController extends Controller
{
    public function getPromotions()
    { 
        $data['list_promotion'] = DB::table('promotion')
                                ->join('product_options','propt_id','prom_propt')
                                ->join('product','prod_id','propt_prod')
                                ->get();
        return view('admin.list_promotion',$data);
    }

    public function getAddProm()
    {
        $session = 'promotion-'.Auth::user()->empl_id;
        $data['content'] = Cart::session($session)->getContent();
        $data['list_prod'] = Product::where('prod_status',1)
                            ->get();
        
        return view('admin.add_promotion',$data);
    }

    public function postAddProm(Request $req)
    {
        $session = 'promotion-'.Auth::user()->empl_id;
        $content = Cart::session($session)->getContent();
        
        //dd($req->name);
        foreach ($content as $key => $value) {
            $promotion = new Promotion;
            $promotion->prom_name = $req->name;
            $promotion->prom_start_date = date_format(date_create($req->start_date),"Y/m/d");
            $promotion->prom_end_date = date_format(date_create($req->end_date),"Y/m/d");
            $promotion->prom_propt = $key;
            $promotion->prom_percent = $value->quantity;
            $promotion->prom_unit_price = $value->attributes['propt_price'];
            $promotion->prom_promotion_price = $value->attributes['propt_price'] - $value->attributes['propt_price']*($value->quantity/100);
            $promotion->prom_status = 0;
            $promotion->save();
        }

        Cart::session($session)->clear();

        return redirect('admin/promotion/');
    }

    public function getItems()
    {
        $session = 'promotion-'.Auth::user()->empl_id;
        $data['content'] = Cart::session($session)->getContent();

        return view('admin.content_list_promotion',$data);
    }

    public function getAddItem(Request $req)
    {
        $session = 'promotion-'.Auth::user()->empl_id;

        $prod = Cart::session($session)->get($req->id);
        if(!empty($prod)){
            return false;
        }

        $options = ProductOptions::find($req->id);
        $product = Product::find($options->propt_prod);
        Cart::session($session)->add(array(
            'id' => $req->id,
            'name' => $product->prod_name,
            'price' => $options->propt_price,
            'quantity' => 1,
            'attributes' => $options
        ));
    }

    public function getDelItem(Request $req)
    {
        $session = 'promotion-'.Auth::user()->empl_id;
        Cart::session($session)->remove($req->id);
    }

    public function getUpdateItem(Request $req)
    {
        $session = 'promotion-'.Auth::user()->empl_id;
        Cart::session($session)->update($req->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $req->qty
            ),
        ));
    }

    public function getCancelAddProm()
    {
        $session = 'promotion-'.Auth::user()->empl_id;
        Cart::session($session)->clear();
        return redirect('admin/promotion/');
    }

    public function getDeleteProm(Request $req)
    {
        $selected = $req->selected;
        if($selected != null){
            foreach ($selected as $key => $value) {
                Promotion::destroy($value);
            }
        }
    }

    public function getViewProm($id)
    {
        $data['prom'] = DB::table('promotion')
                                ->join('product_options','propt_id','prom_propt')
                                ->join('product','prod_id','propt_prod')
                                ->where('prom_id',$id)
                                ->first();

        return view('admin.popup_view_promotion',$data);
    }
}