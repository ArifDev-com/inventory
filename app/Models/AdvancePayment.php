<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvancePayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'amount',
        'date',
        'method',
        'note',
        'bank_note',
    ];
    static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->customer->advance += $model->amount;
            $model->customer->save();
            AdvancePaymentChange::create([
                'advance_payment_id' => $model->id,
                'customer_id' => $model->customer_id,
                'amount' => $model->amount,
                'date' => $model->date,
                'method' => $model->method,
                'note' => $model->note,
                'is_add' => true,
                'before_balance' => $model->customer->advance - $model->amount,
                'after_balance' => $model->customer->advance,
                'created_by' => auth()->user()->id,
                'bank_note' => $model->bank_note,
            ]);
        });
        static::deleted(function ($model) {
            $model->customer->advance -= $model->amount;
            $model->customer->save();
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    function change()
    {
        return $this->hasOne(AdvancePaymentChange::class, 'advance_payment_id', 'id');
    }
}
