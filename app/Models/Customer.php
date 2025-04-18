<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'email',
        'phone',
        'country_id',
        'city_id',
        'address',
        'dob',
        'company_name',
        'advance',
    ];
    protected $with = [
        'creator'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }

    public function cus_items(){
        return $this->hasManyThrough(SaleItem::class, Sale::class);
    }

    public function returns(){
        return $this->hasMany(SaleReturn::class);
    }

    public function payments(){
        return $this->hasMany(CutomerPayment::class, 'customer_id');
    }

    function creator() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
