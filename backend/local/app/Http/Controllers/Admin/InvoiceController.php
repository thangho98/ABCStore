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
use App\InvoiceSession;

use Illuminate\Support\Facades\Log;

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
        $empl_id = Auth::user()->empl_id;
        if(Session($empl_id)){
            $invoiceSession = Session::get($empl_id);
        }
        else{
            $invoiceSession = new InvoiceSession;
            Session::put($empl_id, $invoiceSession);
        }
        $data['list_prod'] = Product::where('prod_status',1)
                            ->get();
        
        $data['content'] = $invoiceSession->getContent();
        $data['total'] = $invoiceSession->getTotal();
        $data['total_qty'] = $invoiceSession->getTotalQuantity();
        
        
        return view('admin.add_invoice',$data);
    }

    public function postAddInvo(Request $req)
    {
        $empl_id = Auth::user()->empl_id;
        $invoiceSession = Session::get($empl_id);
        $content = $invoiceSession->getContent();
        $total = $invoiceSession->getTotal();
        $total_qty = $invoiceSession->getTotalQuantity();

        $invo = new Invoice;

        $invo->invo_code = $req->invo_code;
        $invo->invo_prov = $req->invo_prov;
        $invo->invo_date = date_format(date_create($req->invo_date),"Y/m/d");
        $invo->invo_empl = $empl_id;
        $invo->invo_total_prod = $invoiceSession->getTotalQuantity();
        $invo->invo_total_price = $invoiceSession->getTotal();
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

        Session::forget($empl_id);

        return redirect('admin/invoice/');
    }

    public function getApprovedInvo(Request $req)
    {
        $invo = Invoice::find($req->invo_id);
        if($invo->invo_status == 0){
            $invo->invo_status = 1;
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
        $data['invo'] = Invoice::find($id);
        $listInvoDetail = InvoiceDetail::where('invdt_invo', $id)->get();
        $data['list_provider'] = Provider::all();

        $empl_id = Auth::user()->empl_id;
        if(Session($empl_id)){
            $invoiceSession = Session::get($empl_id);
        }
        else{
            $invoiceSession = new InvoiceSession;
            foreach ($listInvoDetail as $key => $value) {
                $options = ProductOptions::find($value['invdt_propt']);
                $product = Product::find($options->propt_prod);
                $invoiceSession->add($value['invdt_propt'],$product->prod_name,$value['invdt_quantity'],$value['invdt_unit_price'],$options);
            }
            Session::put($empl_id, $invoiceSession);
        }
        $data['list_prod'] = Product::where('prod_status',1)
                            ->get();
        
        $data['content'] = $invoiceSession->getContent();
        $data['total'] = $invoiceSession->getTotal();
        $data['total_qty'] = $invoiceSession->getTotalQuantity();

        return view('admin.edit_invoice',$data);
    }

    public function postEditInvo($id, Request $req)
    {
        $empl_id = Auth::user()->empl_id;
        $invoiceSession = Session::get($empl_id);
        $content = $invoiceSession->getContent();
        $total = $invoiceSession->getTotal();
        $total_qty = $invoiceSession->getTotalQuantity();

        $invo = Invoice::find($id);

        $invo->invo_code = $req->invo_code;
        $invo->invo_prov = $req->invo_prov;
        $invo->invo_date = date_format(date_create($req->invo_date),"Y/m/d");
        $invo->invo_total_prod = $invoiceSession->getTotalQuantity();
        $invo->invo_total_price = $invoiceSession->getTotal();
        $invo->invo_status = 0;
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

        Session::forget($empl_id);

        return redirect('admin/invoice/');
    }
    
    public function getAddItem(Request $req)
    {
        $empl_id = Auth::user()->empl_id;
        if(Session($empl_id)){
            $invoiceSession = Session::get($empl_id);
            
            $options = ProductOptions::find($req->id);
            $product = Product::find($options->propt_prod);
            $invoiceSession->add($req->id,$product->prod_name,1,0,$options);

            Session::put($empl_id, $invoiceSession);
        }
    }

    
    public function getDelItem(Request $req)
    {
        $empl_id = Auth::user()->empl_id;
        if(Session($empl_id)){
            $invoiceSession = Session::get($empl_id);
            $invoiceSession->remove($req->id);

            Session::put($empl_id, $invoiceSession);
        }
    }

    public function getUpdateQtyItem(Request $req)
    {
        $empl_id = Auth::user()->empl_id;
        if(Session($empl_id)){
            $invoiceSession = Session::get($empl_id);
            $invoiceSession->update($req->id, ['quantity' => $req->qty]);

            Session::put($empl_id, $invoiceSession);
        }
    }

    public function getUpdatePriceItem(Request $req)
    {
        $empl_id = Auth::user()->empl_id;
        if(Session($empl_id)){
            $invoiceSession = Session::get($empl_id);
            $invoiceSession->update($req->id, ['price' => $req->price]);

            Session::put($empl_id, $invoiceSession);
        }
    }

    public function getCancelInvo()
    {
        $empl_id = Auth::user()->empl_id;
        Session::forget($empl_id);
        return redirect('admin/invoice/');
    }
}