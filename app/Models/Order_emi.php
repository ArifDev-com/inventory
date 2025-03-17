<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_emi extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'emi_amount',
        'emi_date',
        
    ];

}
