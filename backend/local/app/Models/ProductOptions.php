<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOptions extends Model
{
    protected $table = 'product_options';
    protected $primaryKey = 'propt_id';
    protected $guarded = [];
}