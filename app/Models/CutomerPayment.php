<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutomerPayment extends Model
{
    use HasFactory;

    protected $casts = [
        'affected_sales' => 'array',
        'is_due_pay' => 'boolean',
        'discount' => 'integer',
    ];

    protected $fillable = [
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
        'is_due_pay',
        'due_date',
        'discount',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
