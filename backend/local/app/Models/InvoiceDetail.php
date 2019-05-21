<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $table = 'invoicedetail';
    protected $primaryKey = 'invdt_id';
    protected $guarded = [];
}