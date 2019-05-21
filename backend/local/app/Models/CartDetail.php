<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = 'cartdetail';
    protected $primaryKey = 'cartdt_id';
    protected $guarded = [];
}