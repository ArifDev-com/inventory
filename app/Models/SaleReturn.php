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
        'note'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class,'warehouse_id');
    }

    public function items(){
        return $this->hasMany(SaleReturnItem::class);
    }
}
