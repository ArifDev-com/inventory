<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    
    protected $fillable=[
        'product_id',
        'user_id',
        'purchase_id',
        'quantity',
        'sub_total'
    ];

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
