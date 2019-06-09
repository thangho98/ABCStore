<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOptions;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Guarantee;
use App\Models\Employees;
use DB;
use Auth;

class GuaranteeController extends Controller
{
    public function getGuarantee()
    {   
        $data['list_guar'] = DB::table('guarantee')
                            ->join('orders','guarantee.gtd_orders','orders.order_id')
                            ->join('customer','orders.order_cus','customer.cus_id')
                            ->join('product_options','guarantee.gtd_propt','product_options.propt_id')
                            ->join('product','product_options.propt_prod','product.prod_id')
                            ->get();
        
        $data['list_prod'] = Product::all();
        
        return view('admin.list_guarantee',$data);
    }

    public function getCheckOrder(Request $req)
    {
        $check = Guarantee::where('gtd_serial', $req->gtd_serial)
            ->orderBy('gtd_id','desc')
            ->first();

        $data['order'] =  DB::table('orders')
            ->where('order_id', $req->order_id)
            ->where('propt_id', $req->propt_id)
            ->join('customer','orders.order_cus','customer.cus_id')
            ->join('ordersdetail','orders.order_id','ordersdetail.orddt_order')
            ->join('product_options','ordersdetail.orddt_propt','product_options.propt_id')
            ->join('product','product_options.propt_prod','product.prod_id')
            ->first();
        
        
        

        if(!$data['order']){
            $data['status'] = [
                'result' => false,
                'message' =>"Hóa đơn không tồn tại hoặc sản phẩm không tồn tại trong hóa đơn này"
            ];
            return json_encode($data);
        }

        $dateOrder = $data['order']->order_date;
        $prod_warranty_period = $data['order']->prod_warranty_period;

        $data['date_end_warranty'] = date('Y-m-d', strtotime("+".$prod_warranty_period."months", strtotime($dateOrder)));

        $datenow = date("Y-m-d");

        if($datenow <= $data['date_end_warranty']){
            if($check){
                if($check->gtd_status == 4){
                    $data['status'] = [
                        'result' => true,
                        'message' =>"Được phép bảo hành"
                    ];
                }
                else{
                    $data['status'] = [
                        'result' => false,
                        'message' =>"Sản phẩm này hiện tại đang thuộc diện bảo hành"
                    ];
                }
            }
            else{
                $data['status']=[
                    'result' => true,
                    'message' =>"Được phép bảo hành"
                ];
            }
        }
        else{
            $data['status'] = [
                'result' => false,
                'message' =>"Sản phẩm hết hạn bảo hành"
            ];
        }

        return json_encode($data);
    }

    public function postAddGuarantee(Request $req)
    {
        $guarantee = new Guarantee;
        $guarantee->gtd_orders = $req->order_id;
        $guarantee->gtd_propt = $req->propt_id;
        $guarantee->gtd_serial = $req->serial;
        $guarantee->gtd_required_content = $req->required_content;
        $guarantee->gtd_empl_receive = Auth::user()->empl_id;
        $guarantee->gtd_date_receive = date("Y-m-d");
        $guarantee->gtd_status = 0;
        $guarantee->save();

        $guarantee = Guarantee::where('gtd_orders',$req->order_id)
        ->where('gtd_orders',$req->order_id)
        ->where('gtd_propt',$req->propt_id)
        ->where('gtd_serial',$req->serial)
        ->where('gtd_required_content',$req->required_content)
        ->where('gtd_orders',$req->order_id)
        ->where('gtd_empl_receive',Auth::user()->empl_id)
        ->where('gtd_date_receive',date("Y-m-d"))
        ->where('gtd_status',0)
        ->first();

        return asset('admin/guarantee/print/receive/'.$guarantee->gtd_id);
    }

    public function getViewGuarantee($id)
    {
        $data['guarantee'] =  DB::table('guarantee')
            ->where('gtd_id', $id)
            ->join('orders','orders.order_id','guarantee.gtd_orders')
            ->join('customer','orders.order_cus','customer.cus_id')
            ->join('product_options','guarantee.gtd_propt','product_options.propt_id')
            ->join('product','product_options.propt_prod','product.prod_id')
            ->first();
        $data['gtd_empl_receive']= Employees::find($data['guarantee']->gtd_empl_receive);
        if($data['guarantee']->gtd_status == 3){
            $data['gtd_empl_reimburse']= Employees::find($data['guarantee']->gtd_empl_reimburse);
        }
        return view('admin.popup_view_guarantee', $data);
    }

    public function getEditGuarantee($id)
    {
        $data['guarantee'] =  DB::table('guarantee')
            ->where('gtd_id', $id)
            ->join('orders','orders.order_id','guarantee.gtd_orders')
            ->join('customer','orders.order_cus','customer.cus_id')
            ->join('product_options','guarantee.gtd_propt','product_options.propt_id')
            ->join('product','product_options.propt_prod','product.prod_id')
            ->first();
        return view('admin.popup_edit_guarantee', $data);
    }

    public function postEditGuarantee($id, Request $req)
    {
        $guarantee = Guarantee::find($id);
        $guarantee->gtd_status = $req->status;
        if($req->status == 2){
            $guarantee->gtd_content = $req->content;
        }
        else if($req->status == 3){
            $guarantee->gtd_empl_reimburse = Auth::user()->empl_id;
            $guarantee->gtd_date_reimburse = date("Y-m-d");
        }
        $guarantee->save();
    }

    public function getPrintGuaranteeReceive($id)
    {
        $data['guarantee'] = DB::table('guarantee')
                            ->where('gtd_id',$id)
                            ->join('orders','guarantee.gtd_orders','orders.order_id')
                            ->join('customer','orders.order_cus','customer.cus_id')
                            ->join('employees','guarantee.gtd_empl_receive','employees.empl_id')
                            ->join('product_options','guarantee.gtd_propt','product_options.propt_id')
                            ->join('product','product_options.propt_prod','product.prod_id')
                            ->first();
                            
        return view('admin.print_receive_guarantee', $data);
    }

    public function getPrintGuaranteeReimburse($id)
    {
        $data['guarantee'] = DB::table('guarantee')
                            ->where('gtd_id',$id)
                            ->join('orders','guarantee.gtd_orders','orders.order_id')
                            ->join('customer','orders.order_cus','customer.cus_id')
                            ->join('employees','guarantee.gtd_empl_reimburse','employees.empl_id')
                            ->join('product_options','guarantee.gtd_propt','product_options.propt_id')
                            ->join('product','product_options.propt_prod','product.prod_id')
                            ->first();
                            
        return view('admin.print_reimburse_guarantee', $data);
    }
}