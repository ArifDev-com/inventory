<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'invoice_id',
        'transaction_id',
        'paid_amount',
        'paying_source',
        'status'
    ];
}