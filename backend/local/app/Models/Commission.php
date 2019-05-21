<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $table = 'commission';
    protected $primaryKey = 'cms_id';
    protected $guarded = [];
}