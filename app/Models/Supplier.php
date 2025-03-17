<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand_id',
        'user_id',
        'email',
        'phone',
        'country_id',
        'city_id',
        'address'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
}
