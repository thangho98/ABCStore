<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Promotion;
use App\Models\PromotionDetail;
use App\Models\Product;
use App\Models\ProductOptions;
use DB;
use Cart;
use Auth;
use Session;

class PromotionController extends Controller
{
    public function getPromotions()
    { 
        $data['list_promotion'] = Promotion::all();
        return view('admin.list_promotion',$data);
    }

    public function getAddProm()
    {
        $session = 'promotion-'.Auth::user()->empl_id;
        $data['content'] = Cart::session($session)->getContent();
        $data['list_prod'] = Product::where('prod_status','<>',2)
                            ->get();
        
        return view('admin.add_promotion',$data);
    }

    public function postAddProm(Request $req)
    {
        $session = 'promotion-'.Auth::user()->empl_id;
        $content = Cart::session($session)->getContent();
        
        $promotion = new Promotion;
        $promotion->prom_name = $req->name;
        $promotion->prom_start_date = date_format(date_create($req->start_date),"Y/m/d");
        $promotion->prom_end_date = date_format(date_create($req->end_date),"Y/m/d");
        $promotion->prom_status = 0;
        $promotion->save();

        foreach ($content as $key => $value) {
            $promdt = new PromotionDetail;
            $promdt->promdt_prom = $promotion->prom_id;
            $promdt->promdt_propt = $key;
            $promdt->promdt_percent = $value->quantity;
            $promdt->promdt_unit_price = $value->attributes['propt_price'];
            $promdt->promdt_promotion_price = $value->attributes['propt_price'] - $value->attributes['propt_price']*($value->quantity/100);
            $promdt->save();
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

    public function getOptions($id)
    {
        $list_options = ProductOptions::where('propt_prod',$id)
                            ->get();
        return json_encode($list_options);
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
        Session::forget($session);
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
        $data['prom'] = Promotion::find($id);
        
        $data['list_promotiondetail'] = DB::table('promotiondetail')
                            ->join('product_options','propt_id','promdt_propt')
                            ->join('product','prod_id','propt_prod')
                            ->where('promdt_prom',$id)
                            ->get();

        return view('admin.popup_view_promotion',$data);
    }

    public function getEditProm($id)
    {
        $data['prom'] = Promotion::find($id);

        if($data['prom']->prom_status != 0){
            return redirect('admin/promotion/');
        }
        
        $list_promotiondetail = DB::table('promotiondetail')
                            ->join('product_options','propt_id','promdt_propt')
                            ->join('product','prod_id','propt_prod')
                            ->where('promdt_prom',$id)
                            ->get();
                            
        $data['list_prod'] = Product::where('prod_status','<>',2)
                    ->get();
        
        $session = 'promotion-'.Auth::user()->empl_id;

        if(!Session($session)){
            foreach ($list_promotiondetail as $key => $value) {
                $options = ProductOptions::find($value->promdt_propt);
                $product = Product::find($options->propt_prod);
                
                Cart::session($session)->add(array(
                    'id' => $value->promdt_propt,
                    'name' => $product->prod_name,
                    'price' => $options->propt_price,
                    'quantity' => $value->promdt_percent,
                    'attributes' => $options
                ));
            }
            Session::put($session, $session);
        }

        $data['content'] = Cart::session($session)->getContent();

        return view('admin.edit_promotion',$data);
    }

    public function postEditProm($id, Request $req)
    {
        $session = 'promotion-'.Auth::user()->empl_id;
        $content = Cart::session($session)->getContent();
        
        $promotion = Promotion::find($id);
        $promotion->prom_name = $req->name;
        $promotion->prom_start_date = date_format(date_create($req->start_date),"Y/m/d");
        $promotion->prom_end_date = date_format(date_create($req->end_date),"Y/m/d");
        $promotion->save();

        $list_promotiondetail = PromotionDetail::where('promdt_prom',$id)
                            ->get();

        foreach ($list_promotiondetail as $key => $value) {
            PromotionDetail::destroy($value['promdt_id']);
        }

        foreach ($content as $key => $value) {
            $promdt = new PromotionDetail;
            $promdt->promdt_prom = $promotion->prom_id;
            $promdt->promdt_propt = $key;
            $promdt->promdt_percent = $value->quantity;
            $promdt->promdt_unit_price = $value->attributes['propt_price'];
            $promdt->promdt_promotion_price = $value->attributes['propt_price'] - $value->attributes['propt_price']*($value->quantity/100);
            $promdt->save();
        }

        Cart::session($session)->clear();
        Session::forget($session);

        return redirect('admin/promotion/');
    }

}