<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_id',
        'quotation_id',
        'quantity',
        'sub_total'
    ];

    public function quotation(){
        return $this->belongsTo(Quotation::class);
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
