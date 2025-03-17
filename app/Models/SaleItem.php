<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable=[
        'sale_id',
        'user_id',
        'product_id',
        'quantity',
        'price',
        'product_desc',
        'purchase_price',
        'sub_total',
        'price_type',
    ];

    public function sale(){
        return $this->belongsTo(Sale::class);
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
