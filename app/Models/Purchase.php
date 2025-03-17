<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'supplier_id',
        'user_id',
        'warehouse_id',
        'date',
        'purchase_code',
        'tax',
        'discount',
        'shipping',
        'grandtotal',
        'paid_amount',
        'due_amount',
        'status',
        'note',
    ];


    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class,'warehouse_id');
    }

    public function items(){
        return $this->hasMany(PurchaseItem::class);
    }

    public function getTotalItemsAttribute(){
        return $this->hasMany(PurchaseItem::class)->count();
    }
}
