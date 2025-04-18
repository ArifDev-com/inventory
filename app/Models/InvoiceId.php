<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceId extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'invoice_id',
        'pay_amount'
    ];

}