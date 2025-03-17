<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable=[
        'from_warehouse_id',
        'to_warehouse_id',
        'date',
        'ref_code',
        'item',
        'tax',
        'discount',
        'shipping',
        'grandtotal',
        'status',
        'note'
    ];

    public function warehouse(){
        return $this->belongsTo(Warehouse::class,'warehouse_id');
    }

    public function items(){
        return $this->hasMany(TransferItem::class);
    }
    public function from_warehouse(){
    return $this->belongsTo(Warehouse::class, 'from_warehouse_id');
    }
    public function to_warehouse(){
    return $this->belongsTo(Warehouse::class, 'to_warehouse_id');
    }
}
