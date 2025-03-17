<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    
    protected $fillable=[
        'expenseCategory_id',
        'user_id',
        'date',
        'amount',
        'expense_code',
        'expense_for',
        'description',
        'status'
    ];

    
    public function expenseCategory(){
        return $this->belongsTo(ExpenseCategory::class,'expenseCategory_id');
    }

    
}
