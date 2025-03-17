<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamageProductItem extends Model
{
    use HasFactory;

    protected $fillable=[
        'damage_product_id',
        'product_id',
        'quantity',
        'sub_total'
    ];

    public function damageProduct(){
        return $this->belongsTo(DamageProduct::class);
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
