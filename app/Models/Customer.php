<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'user_id',
        'email',
        'phone',
        'country_id',
        'city_id',
        'address',
        'dob',
        'company_name',
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
    function creator() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
