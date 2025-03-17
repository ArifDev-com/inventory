<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraExpense extends Model
{
    use HasFactory;

    
    protected $fillable=[
        'expenseCategory_id',
        'date',
        'amount',
        'expense_code',
        'expense_for',
        'description',
        'status'
    ];

    
    public function expenseCategory(){
        return $this->belongsTo(ExtraExpenseCategory::class,'expenseCategory_id');
    }
}
