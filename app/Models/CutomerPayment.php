<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutomerPayment extends Model
{
    use HasFactory;
    protected $casts = [
        'affected_sales' => 'array',
    ];
    protected $fillable=[
       'date',
       'reference',
        'user_id',
        'paying_amount',
        'sale_id',
        'down_payment',
        'customer_id',
        'payment_method',
        'note',
        'affected_sales',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
