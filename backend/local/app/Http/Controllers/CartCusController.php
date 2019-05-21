<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartCusController extends Controller
{
    public function getAddCart($id)
    {
        $product = Product::find($id);
        Cart::add(array(
            'id' => $id,
            'name' => $product->prod_name,
            'price' => $product->prod_price,
            'quantity' => 1,
            'attributes' => array('img'=>$product->prod_img)
        ));
        return redirect('cart/show');
    }

    public function getShowCart()
    {
        $data['total'] = Cart::getTotal();
        $data['items'] = Cart::getContent();
        return view('frontend.cart', $data);
    }

    public function getDeleteCart($id)
    {
        if($id=='all'){
            Cart::clear();
        }
        else{
            Cart::remove($id);
        }
        return back();
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

    public function postComplete(Request $req)
    {
        $data['info'] = $req->all();
        $email = $req->email;
        $data['cart'] = Cart::getContent();
        $data['total'] = Cart::getTotal();
        Mail::send('frontend.email', $data, function ($message) use($email) {
            $message->from('thanglong2098@gmail.com', 'Vietpro');

            $message->to($email, $email);

            $message->cc('hiendaihuynh123@gmail.com', 'Thái Thăng');

            $message->subject('Xác nhận hóa đơn mua hàng Vietproshop');
        });

        Cart::clear();

        return redirect('complete');
    }

    public function getComplete()
    {
        return view('frontend.complete');
    }
}