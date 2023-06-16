<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table='sales'; 

    protected $fillable = [
        'user_id',
        'branchname',
        'salesdate',
        'totalsales',
        'sales_img',
        'sales_status',
    ];
}
