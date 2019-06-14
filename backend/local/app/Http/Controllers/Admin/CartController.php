<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\CartDetail;
use App\Models\Customer;

use DB;

class CartController extends Controller
{
    public function getCartOnline()
    { 
        $data['list_cart'] =  Carts::all();
        return view('admin.list_cart_online',$data);
    }

    public function getViewDetailCartOnline($id)
    {
        $data['carts'] = Carts::find($id);
                            
        $data['list_cartdetail'] = DB::table('cartdetail')
                                ->where('cartdt_cart',$id)
                                ->join('product_options','cartdetail.cartdt_propt','product_options.propt_id')
                                ->join('product','product_options.propt_prod','product.prod_id')
                                ->get();
                            
        return view('admin.popup_view_cart_online', $data);
    }
}