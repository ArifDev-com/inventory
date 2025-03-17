<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutomerPayment extends Model
{
    use HasFactory;
    protected $fillable=[
       'date',
       'reference',
        'user_id',
        'paying_amount',
        'sale_id',
        'down_payment',
    ];
}
