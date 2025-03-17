<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'city_id',
        'zip_code',
        'address'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // public function sale_items(){
    //     return $this->hasManyThrough(SaleItem::class, Sale::class);
    // }

   
}
