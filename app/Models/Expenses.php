<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'sum',
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
