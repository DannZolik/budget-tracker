<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\HasAvatar;


// enable when you need. do not forget to set up email
//class User extends Authenticatable implements HasAvatar, MustVerifyEmail
class User extends Authenticatable implements HasAvatar
{
    use HasFactory, Notifiable;
    public function getFilamentAvatarUrl(): ?string
    {
        if (is_null($this->avatar)){
            return null;
        }
        return url('/storage/'.$this->avatar);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'avatar',
        'email',
        'password',
    ];

    public function earningCategories()
    {
        return $this->hasMany(EarningCategory::class);
    }

    public function expensesCategories()
    {
        return $this->hasMany(ExpenseCategory::class);
    }

    public function earnings()
    {
        return $this->hasMany(Earnings::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
