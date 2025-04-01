<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'warehouse_id',
        'date',
        'ref_code',
        'tax',
        'discount',
        'shipping',
        'grandtotal',
        'status',
        'description',
        'other_cost',
        'user_id',
    ];

    protected $casts = [
        'grandtotal' => 'integer',
        'other_cost' => 'integer',
        'discount' => 'integer',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(QuotationItem::class);
    }
}
