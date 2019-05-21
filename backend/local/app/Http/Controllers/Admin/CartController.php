<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Customer;

use DB;

class CartController extends Controller
{
    public function getCartOnline()
    { 
        $data['list_cart'] = DB::table('cart')
                            ->join('customer','cart.cart_cus','customer.cus_id')
                            ->get();
        return view('admin.list_cart_online',$data);
    }

    public function getViewDetailCartOnline($id)
    {
        $data['cart'] = DB::table('cart')
                            ->join('customer','cart.cart_cus','customer.cus_id')
                            ->first();
        $data['list_cartdetail'] = DB::table('cartdetail')
                            ->join('cart','cartdetail.cartdt_cart','cart.cart_id')
                            ->join('product','cartdetail.cartdt_prod','product.prod_id')
                            ->get();
        return view('admin.popup_view_cart_online', $data);
    }
}