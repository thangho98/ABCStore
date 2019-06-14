<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carts;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\ProductOptions;
use App\Models\Customer;
use Cart;
use DB;
use Mail;

class CartCusController extends Controller
{
    public function getAddCart($id)
    {
        $prod = Cart::get($id);
        if(empty($prod)){
            $options = ProductOptions::find($id);
            $product = Product::find($options->propt_prod);
            $options['prod_img'] = $product->prod_poster;

            $promotion = DB::table('promotiondetail')
                    ->join('promotion','promotion.prom_id','promotiondetail.promdt_prom')
                    ->where('prom_status',1)
                    ->where('promdt_propt',$options->propt_id)
                    ->orderBy('prom_id','desc')
                    ->first();
            
            $price =  $options->propt_price;
            if($promotion != null){
                $price = $promotion->promdt_promotion_price;
            }

            Cart::add(array(
                'id' => $id,
                'name' => $product->prod_name,
                'price' => $price,
                'quantity' => 1,
                'attributes' => $options
            ));
        }
        return redirect('cart/show');
    }

    public function getShowCart()
    {
        $data['totalprice'] = Cart::getTotal();
        $data['content'] = Cart::getContent();
        return view('abcstore.cart', $data);
    }

    public function getDeleteCart($id)
    {
        if($id=='all'){
            Cart::clear();
            return redirect('/');
        }
        else{
            Cart::remove($id);
            return back();
        }
    }

    public function getUpdateCart(Request $req)
    {
        Cart::update($req->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $req->qty
            ),
          ));
    }    

    public function getComplete()
    {
        return view('abcstore.complete');
    }

    public function getCheckout()
    {
        $data['totalquantity'] = Cart::getTotalQuantity();
        $data['totalprice'] = Cart::getTotal();
        $data['content'] = Cart::getContent();
        if(count($data['content'])>0){
            return view('abcstore.checkout', $data);
        }
        else{
            return redirect('cart/show');
        }
    }

    public function postCheckout(Request $req)
    {
        $carts = new Carts;
        $carts->cart_date = date("Y-m-d");
        $carts->cart_cus_name = $req->cus_name;
        $carts->cart_cus_phone = $req->cus_phone;
        $carts->cart_cus_email = $req->cus_email;
        $carts->cart_total_prod = Cart::getTotalQuantity();;
        $carts->cart_total_price = Cart::getTotal();
        $carts->cart_remember_token = $req->_token;
        $carts->cart_status = 0;
        $carts->save();
        
        $data['content'] = Cart::getContent();
        $data['total_carts'] = Cart::getTotal();
        $data['total_qty_carts'] = Cart::getTotalQuantity();

        foreach ($data['content'] as $key => $value) {
            $cartdetail = new CartDetail;
            $cartdetail->cartdt_cart = $carts->cart_id;
            $cartdetail->cartdt_propt = $key;
            $cartdetail->cartdt_prod_quantity = $value->quantity;
            $cartdetail->cartdt_prod_unit_price = $value->attributes['propt_price'];
            $cartdetail->cartdt_prod_promotion_price = $value->attributes['propt_price'];
            $cartdetail->cartdt_total = $value->quantity*$value->price;
            $cartdetail->save();
        }

        $email = $req->cus_email;
        $data['carts'] = $carts;
        $data['info'] = $req->all();
        
        Mail::send('abcstore.email', $data, function ($message) use($email) {
            $message->from('thanglong2098@gmail.com', 'ABCStore');

            $message->to($email, $email);

            $message->cc('16521484@gm.uit.edu.vn', 'ABCStore');

            $message->subject('Xác nhận hóa đơn mua hàng ABCStore');
        });


        Cart::clear();

        return redirect('cart/complete');
    }

    public function getConfirm($token, $id)
    {
        $carts = Carts::where('cart_id',$id)
                        ->where('cart_remember_token', $token)
                        ->first();
        
        $carts->cart_status = 1;
        $carts->save();
        return redirect('/');
    }
}