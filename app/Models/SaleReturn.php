<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReturn extends Model
{
    use HasFactory;

    protected $fillable=[
        'customer_id',
        'warehouse_id',
        'date',
        'ref_code',
        'tax',
        'discount',
        'shipping',
        'grandtotal',
        'paid_amount',
        'status',
        'note',
        'sale_id',
        'status'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function sale() {
        return $this->belongsTo(Sale::class, 'sale_id');
    }

    public function items(){
        return $this->hasMany(SaleReturnItem::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
