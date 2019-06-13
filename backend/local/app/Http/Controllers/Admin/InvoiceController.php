<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductOptions;
use App\Models\invoice;
use App\Models\InvoiceDetail;
use App\Models\Provider;
use Auth;
use DB;
use Session;
use Cart;

class InvoiceController extends Controller
{
    public function getInvo()
    { 
        $data['list_invoice'] = DB::table('invoice')
                            ->join('provider','invoice.invo_prov','provider.prov_id')
                            ->get();
                            
        return view('admin.list_invoice',$data);
    }

    public function getAddInvo()
    {
        $data['list_provider'] = Provider::all();
        $data['list_prod'] = Product::where('prod_status','<>',2)
                            ->get();

        $empl_id = Session::get('user')->empl_id;
        $session = 'invoice-'. $empl_id;
                
        $data['content'] =  Cart::session($session)->getContent();
        $data['total'] = Cart::session($session)->getTotal();
        $data['total_qty'] = Cart::session($session)->getTotalQuantity();
        

        return view('admin.add_invoice',$data);
    }

    public function getOptions($id)
    {
        $list_options = ProductOptions::where('propt_prod',$id)
                            ->get();
        return json_encode($list_options);
    }

    public function postAddInvo(Request $req)
    {
        $empl_id = Session::get('user')->empl_id;
        $session = 'invoice-'. $empl_id;

        $content =  Cart::session($session)->getContent();
        $total = Cart::session($session)->getTotal();
        $total_qty = Cart::session($session)->getTotalQuantity();

        $invo = new Invoice;

        $invo->invo_code = $req->invo_code;
        $invo->invo_prov = $req->invo_prov;
        $invo->invo_date = date_format(date_create($req->invo_date),"Y/m/d");
        $invo->invo_empl = $empl_id;
        $invo->invo_total_prod = Cart::session($session)->getTotalQuantity();
        $invo->invo_total_price = Cart::session($session)->getTotal();
        $invo->invo_status = 0;
        $invo->save();

        foreach ($content as $key => $value) {
            $invoDetail = new InvoiceDetail;
            $invoDetail->invdt_invo = $invo->invo_id;
            $invoDetail->invdt_propt = $value['id'];
            $invoDetail->invdt_quantity = $value['quantity'];
            $invoDetail->invdt_unit_price = $value['price'];
            $invoDetail->invdt_total = $value['quantity']*$value['price'];
            $invoDetail->save();
        }

        Cart::session($session)->clear();

        return redirect('admin/invoice/');
    }

    public function getApprovedInvo(Request $req)
    {
        $invo = Invoice::find($req->invo_id);
        if($invo->invo_status == 0){
            $invo->invo_status = 1;
            $invo->invo_date_approved = date("Y/m/d");
            $invo->save();
        }
    }

    public function getDeleteInvo(Request $req)
    {
        $invo = Invoice::find($req->invo_id);
        if($invo->invo_status == 0){
            Invoice::destroy($req->invo_id);
        }
    }

    public function getViewInvo($id)
    {
        $data['invo'] = DB::table('invoice')
        ->where('invo_id',$id)
        ->join('employees','invoice.invo_empl','employees.empl_id')
        ->join('provider','invoice.invo_prov','provider.prov_id')
        ->first();

        $data['list_invodetail'] = DB::table('invoicedetail')
        ->where('invdt_invo',$id)
        ->join('product_options','invoicedetail.invdt_propt','product_options.propt_id')
        ->join('product','product_options.propt_prod','product.prod_id')
        ->get();
        
        return view('admin.popup_view_invoice', $data);
    }

    public function getEditInvo($id)
    {
        $data['list_provider'] = Provider::all();
        $data['list_prod'] = Product::where('prod_status','<>',2)
                            ->get();

        $data['invo'] = Invoice::find($id);
        $listInvoDetail = InvoiceDetail::where('invdt_invo', $id)->get();
        
        if($data['invo'] != 0){
            return redirect('admin/invoice/');
        }

        $empl_id = Session::get('user')->empl_id;
        $session = 'invoice-'. $empl_id;
        
        if(!Session($session)){
            foreach ($listInvoDetail as $key => $value) {
                $options = ProductOptions::find($value['invdt_propt']);
                $product = Product::find($options->propt_prod);
                
                Cart::session($session)->add(array(
                    'id' => $value['invdt_propt'],
                    'name' => $product->prod_name,
                    'price' => $value['invdt_unit_price'],
                    'quantity' => $value['invdt_quantity'],
                    'attributes' => $options
                ));
            }
            Session::put($session, $session);
        }

        $data['content'] =  Cart::session($session)->getContent();
        $data['total'] =Cart::session($session)->getTotal();
        $data['total_qty'] = Cart::session($session)->getTotalQuantity();

        return view('admin.edit_invoice',$data);
    }

    public function postEditInvo($id, Request $req)
    {
        $empl_id = Session::get('user')->empl_id;
        $session = 'invoice-'. $empl_id;

        $content =  Cart::session($session)->getContent();
        $total = Cart::session($session)->getTotal();
        $total_qty = Cart::session($session)->getTotalQuantity();

        $invo = Invoice::find($id);

        $invo->invo_total_prod = Cart::session($session)->getTotalQuantity();
        $invo->invo_total_price =Cart::session($session)->getTotal();
        $invo->save();
        
        $listInvoDetail = InvoiceDetail::where('invdt_invo', $id)->get();

        foreach ($listInvoDetail as $key => $value) {
            InvoiceDetail::destroy($value['invdt_id']);
        }

        foreach ($content as $key => $value) {
            $invoDetail = new InvoiceDetail;
            $invoDetail->invdt_invo = $id;
            $invoDetail->invdt_propt = $value['id'];
            $invoDetail->invdt_quantity = $value['quantity'];
            $invoDetail->invdt_unit_price = $value['price'];
            $invoDetail->invdt_total = $value['quantity']*$value['price'];
            $invoDetail->save();
        }

        Cart::session($session)->clear();
        Session::forget($session);

        return redirect('admin/invoice/');
    }
    
    public function getAddItem(Request $req)
    {
        $empl_id = Session::get('user')->empl_id;
        $session = 'invoice-'. $empl_id;

        $prod = Cart::session($session)->get($req->id);
        if(!empty($prod)){
            return false;
        }

        $options = ProductOptions::find($req->id);
        $product = Product::find($options->propt_prod);

        Cart::session($session)->add(array(
            'id' => $req->id,
            'name' => $product->prod_name,
            'price' => 0,
            'quantity' => 1,
            'attributes' => $options
        ));
    }

    public function getDelItem(Request $req)
    {
        $empl_id = Session::get('user')->empl_id;
        $session = 'invoice-'. $empl_id;

        Cart::session($empl_id)->remove($req->id);
    }

    public function getUpdateQtyItem(Request $req)
    {
        $empl_id = Session::get('user')->empl_id;
        $session = 'invoice-'. $empl_id;

        Cart::session($session)->update($req->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $req->qty
            ),
        ));
    }

    public function getUpdatePriceItem(Request $req)
    {
        $empl_id = Session::get('user')->empl_id;
        $session = 'invoice-'. $empl_id;

        Cart::session($session)->update($req->id, array(
            'price' => $req->price,
        ));
    }

    public function getCancelInvo()
    {
        $empl_id = Session::get('user')->empl_id;
        $session = 'invoice-'. $empl_id;
        
        Cart::session($session)->clear();
        Session::forget($session);
        return redirect('admin/invoice/');
    }
}