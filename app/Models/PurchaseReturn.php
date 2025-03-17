<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    use HasFactory;

    protected $fillable=[
        'supplier_id',
        'warehouse_id',
        'date',
        'ref_code',
        'tax',
        'discount',
        'paid_amount',
        'shipping',
        'grandtotal',
        'status',
        'note'
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class,'warehouse_id');
    }

    public function items(){
        return $this->hasMany(PurchaseReturnItem::class);
    }
}
