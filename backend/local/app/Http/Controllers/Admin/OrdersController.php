<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\ProductOptions;
use App\Models\Carts;
use App\Models\CartDetail;

use DB;
use Cart;
use Auth;
use Session;
class OrdersController extends Controller
{
    public function getOrders()
    { 
        $data['list_orders'] = DB::table('orders')
                            ->join('customer','orders.order_cus','customer.cus_id')
                            ->get();
        return view('admin.list_orders',$data);
    }

    public function getViewDetailOrders($id)
    {
        $data['orders'] = DB::table('orders')
                            ->where('order_id',$id)
                            ->join('customer','orders.order_cus','customer.cus_id')
                            ->join('employees','orders.order_empl','employees.empl_id')
                            ->first();

        $data['list_ordersdetail'] = DB::table('ordersdetail')
                            ->where('orddt_order',$id)
                            ->join('product_options','ordersdetail.orddt_propt','product_options.propt_id')
                            ->join('product','product_options.propt_prod','product.prod_id')
                            ->get();
                            
        return view('admin.popup_view_orders', $data);
    }

    public function getAddOrders()
    {
        $empl_id = Session::get('user')->empl_id;
        //Cart::session($empl_id)->clear();
        $data['total_orders'] = Cart::session($empl_id)->getTotal();
        $data['total_qty'] = Cart::session($empl_id)->getTotalQuantity();
        $data['content'] = Cart::session($empl_id)->getContent();
        $data['list_prod'] = Product::where('prod_status',1)
                            ->get();
        
        return view('admin.add_orders',$data);
    }

    public function postAddOrders(Request $req)
    {
        $cus = new Customer;
        $cus->cus_name = $req->cus_name;
        $cus->cus_phone = $req->cus_phone;
        $cus->cus_email = $req->cus_email;
        $cus->cus_identity_card = $req->cus_identity_card;
        $cus->save();

        $empl_id = Session::get('user')->empl_id;
        $total_qty_orders = Cart::session($empl_id)->getTotalQuantity();
        $total_orders = Cart::session($empl_id)->getTotal();
        
        $orders = new Orders;
        $orders->order_date = date("Y-m-d");
        $orders->order_empl = $empl_id;
        $orders->order_cus = $cus->cus_id;
        $orders->order_total_prod = $total_qty_orders;
        $orders->order_total_price = $total_orders;
        $orders->order_remember_token = $req->_token;
        $orders->save();

        $content = Cart::session($empl_id)->getContent();

        foreach ($content as $key => $value) {
            $ordersdetail = new OrdersDetail;
            $ordersdetail->orddt_order = $orders->order_id;
            $ordersdetail->orddt_propt = $key;
            $ordersdetail->orddt_quantity = $value->quantity;
            $ordersdetail->orddt_unit_price = $value->attributes['propt_price'];
            $ordersdetail->orddt_promotion_price = $value->price;
            $ordersdetail->orddt_total = $value->quantity*$value->price;
            $ordersdetail->save();
        }
        
        Cart::session($empl_id)->clear();
        return redirect('admin/orders/print/'.$orders->order_id);
    }
    public function getAddOrdersFromCart($id)
    {
        $carts = Carts::find($id);
        $data['cus'] = Customer::find($carts->cart_cus);
        $empl_id = Session::get('user')->empl_id;

        if(Session::get('userID') == null){
            $list_option = CartDetail::where('cartdt_cart',$id)->get();
            foreach ($list_option as $key => $value) {
                $options = ProductOptions::find($value->cartdt_propt);
                $product = Product::find($options->propt_prod);
                Cart::session($empl_id)->add(array(
                    'id' => $value->cartdt_propt,
                    'name' => $product->prod_name,
                    'price' => $value->cartdt_prod_promotion_price,
                    'quantity' => 1,
                    'attributes' => $options
                ));
            }
            Session::put('userID', $empl_id);
        }
        
        $data['total_orders'] = Cart::session($empl_id)->getTotal();
        $data['total_qty'] = Cart::session($empl_id)->getTotalQuantity();
        $data['content'] = Cart::session($empl_id)->getContent();
        $data['list_prod'] = Product::where('prod_status',1)
                            ->get();
        
        return view('admin.add_orders_cart_online',$data);
    }

    public function postAddOrdersFromCart(Request $req, $id)
    {
        $carts = Carts::find($id);
        
        $cus = Customer::find($carts->cart_cus);
        $cus->cus_name = $req->cus_name;
        $cus->cus_phone = $req->cus_phone;
        $cus->cus_email = $req->cus_email;
        $cus->cus_identity_card = $req->cus_identity_card;
        $cus->save();

        $empl_id = Session::get('user')->empl_id;
        $total_qty_orders = Cart::session($empl_id)->getTotalQuantity();
        $total_orders = Cart::session($empl_id)->getTotal();
        
        $orders = new Orders;
        $orders->order_date = date("Y-m-d");
        $orders->order_empl = $empl_id;
        $orders->order_cus = $cus->cus_id;
        $orders->order_total_prod = $total_qty_orders;
        $orders->order_total_price = $total_orders;
        $orders->order_remember_token = $req->_token;
        $orders->save();

        $content = Cart::session($empl_id)->getContent();

        foreach ($content as $key => $value) {
            $ordersdetail = new OrdersDetail;
            $ordersdetail->orddt_order = $orders->order_id;
            $ordersdetail->orddt_propt = $key;
            $ordersdetail->orddt_quantity = $value->quantity;
            $ordersdetail->orddt_unit_price = $value->attributes['propt_price'];
            $ordersdetail->orddt_promotion_price = $value->price;
            $ordersdetail->orddt_total = $value->quantity*$value->price;
            $ordersdetail->save();
        }
        
        $carts->cart_status = 2;
        $carts->save();

        Cart::session($empl_id)->clear();
        Session::forget('userID');
        return redirect('admin/orders/print/'.$orders->order_id);
    }
    
    public function getOptions($id)
    {
        $list_options = ProductOptions::where('propt_prod',$id)
                            ->where('propt_quantity','>',0)
                            ->get();
        return json_encode($list_options);
    }

    public function getAddItem(Request $req)
    {
        $empl_id = Session::get('user')->empl_id; // or any string represents user identifier

        $prod = Cart::session($empl_id)->get($req->id);
        if(!empty($prod)){
            return false;
        }

        $options = ProductOptions::find($req->id);
        $product = Product::find($options->propt_prod);
        $promotion = Promotion::where('prom_status',1)
                ->where('prom_propt',$options->propt_id)
                ->first();
        $price =  $options->propt_price;
        if($promotion != null){
            $price = $promotion->prom_promotion_price;
        }
        Cart::session($empl_id)->add(array(
            'id' => $req->id,
            'name' => $product->prod_name,
            'price' => $price,
            'quantity' => 1,
            'attributes' => $options
        ));
    }

    public function getDelItem(Request $req)
    {
        $empl_id = Session::get('user')->empl_id; // or any string represents user identifier
        Cart::session($empl_id)->remove($req->id);
    }

    public function getUpdateItem(Request $req)
    {
        $empl_id = Session::get('user')->empl_id;
        Cart::session($empl_id)->update($req->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $req->qty
            ),
        ));
    }

    public function getPrintOrders($id)
    {
        $data['orders'] = DB::table('orders')
                            ->where('order_id',$id)
                            ->join('customer','orders.order_cus','customer.cus_id')
                            ->leftjoin('employees','orders.order_empl','employees.empl_id')
                            ->first();

        $data['list_ordersdetail'] = DB::table('ordersdetail')
                            ->where('orddt_order',$id)
                            ->join('product_options','ordersdetail.orddt_propt','product_options.propt_id')
                            ->join('product','product_options.propt_prod','product.prod_id')
                            ->get();
                            
        return view('admin.print_orders', $data);
    }

    public function getCancelOrders()
    {
        $empl_id = Session::get('user')->empl_id;
        Cart::session($empl_id)->clear();
        return redirect('admin/orders/');
    }
}