<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarningCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'user_id',
        'icon_color',
        'bg_color',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
