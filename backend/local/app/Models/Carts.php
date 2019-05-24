<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    protected $guarded = [];
}