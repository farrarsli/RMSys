<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table='request'; 

    protected $fillable = [
        'user_id',
        'req_status',
        'limit_stock',
        'req_stock',
        'balance_stock',
    ];

    

}
