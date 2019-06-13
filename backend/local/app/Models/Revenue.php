<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $table = 'revenue';
    protected $primaryKey = 'reve_id';
    protected $guarded = [];
}