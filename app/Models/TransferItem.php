<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferItem extends Model
{
    use HasFactory;

    protected $fillable=[
        'transfer_id',
        'product_id',
        'quantity',
        'sub_total'
    ];

    public function transfer(){
        return $this->belongsTo(Transfer::class);
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
