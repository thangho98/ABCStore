<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    protected $table = 'ordersdetail';
    protected $primaryKey = 'orddt_id';
    protected $guarded = [];
}