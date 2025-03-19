<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'warehouse_id',
        'date',
        'ref_code',
        'tax',
        'discount',
        'shipping',
        'grandtotal',
        'paid_amount',
        'due_amount',
        'payment_status',
        'payment_type',
        'barcode_url',
        'note',
        'due_date',
        'other_cost',
        'price_type',
        'cancel_requested',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class,'warehouse_id');
    }

    public function items(){
        return $this->hasMany(SaleItem::class);
    }
}
