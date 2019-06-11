<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Commission;
use DB;

class CommissionController extends Controller
{
    public function getSalary(Request $req)
    {
        if(empty($req->month) || empty($req->year))
        {
            $data['month'] = (int)date('m');
            $data['year'] = (int)date('Y');
        }
        else{
            $data['month'] = $req->month;
            $data['year'] = $req->year;
        }

        $data['salary'] = DB::table('employees')
                        ->where('cms_month', $data['month'])
                        ->where('cms_year', $data['year'])
                        ->where('empl_status', 0)
                        ->leftJoin('commission','cms_empl','empl_id')
                        ->get();
        
        if(!empty($data['salary'])){
            $data['sum_basic'] = 0;
            $data['sum_commission'] = 0;
            foreach ($data['salary'] as $key => $value) {
                $data['sum_basic'] += $value->empl_basic_salary;
                $data['sum_commission'] += $value->cms_total;
            }
            $data['sum_total'] = $data['sum_basic'] + $data['sum_commission'];
        }
        //dd($data);
        return view('admin.salary',$data);
    }
}