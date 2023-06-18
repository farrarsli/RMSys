<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table='request'; 

    protected $fillable = [
        'sales_id',
        'product_id',
        'requeststock',
    ];

    

}
