<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarningReport extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'sum',
        'from_date',
        'to_date',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
