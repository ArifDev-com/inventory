<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    use HasFactory;
    protected $fillable=[
        'warehouse_id',
        'date',
        'ref_code',
        'status'
    ];

    public function warehouse(){
        return $this->belongsTo(Warehouse::class,'warehouse_id');
    }

    public function items(){
        return $this->hasMany(AdjustmentItem::class);
    }
}
