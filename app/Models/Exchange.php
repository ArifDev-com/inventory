<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $fillable=[
        'saleReturn_id',
        'saleReturnItem_id',
        'price',
        'quantity'
    ];

    
    public function saleReturn(){
        return $this->belongsTo(SaleReturn::class,'warehouse_id');
    }

    public function items(){
        return $this->hasMany(SaleReturnItem::class);
    }
}
