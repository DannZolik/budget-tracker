<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'expenses_category_id',
        'amount',
        'expense_date',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function expensesCategory()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
