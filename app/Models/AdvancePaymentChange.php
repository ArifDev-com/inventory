<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvancePaymentChange extends Model
{
    use HasFactory;
    protected $fillable = [
        'advance_payment_id',
        'customer_id',
        'amount',
        'date',
        'method',
        'note',
        'is_add',
        'before_balance',
        'after_balance',
        'created_by',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function advancePayment()
    {
        return $this->belongsTo(AdvancePayment::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
