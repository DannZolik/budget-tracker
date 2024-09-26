<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earnings extends Model
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

    public function EarningsCategory()
    {
        return $this->belongsTo(EarningCategory::class);
    }
}

