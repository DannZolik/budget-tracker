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

    public function rolee()
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

    protected static function booted(): void
    {
        static::created(function ($user) {
            // Automatically create earning categories for the new user
            $earningCategories = ['Salary', 'Scholarship', 'Other'];
            $earningIcons = ['heroicon-s-credit-card', 'heroicon-s-academic-cap', 'heroicon-s-banknotes'];
            $earningIconsColor = ['#1a1716', '#1a1716', '#1a1716'];
            $earningBgColor = ['#1be104', '#04dee1', '#cbcbcb'];

            foreach ($earningCategories as $index => $category) {
                EarningCategory::create([
                    'name' => $category,
                    'user_id' => $user->id,
                    'icon' => $earningIcons[$index],
                    'icon_color' => $earningIconsColor[$index],
                    'bg_color' => $earningBgColor[$index],
                ]);
            }

            // Automatically create expense categories for the new user
            $expenseCategories = ['Food', 'Transport', 'Entertainment', 'Health', 'Education', 'Other'];
            $expenseIcons = ['heroicon-s-shopping-cart', 'heroicon-s-truck', 'heroicon-s-ticket', 'heroicon-s-heart', 'heroicon-s-academic-cap', 'heroicon-s-banknotes'];
            $expenseIconsColor = ['#1a1716', '#1a1716', '#1a1716', '#1a1716', '#1a1716', '#1a1716'];
            $expenseBgColor = ['#1be104', '#04dee1', '#cbcbcb', '#1be104', '#04dee1', '#cbcbcb'];

            foreach ($expenseCategories as $index => $category) {
                ExpenseCategory::create([
                    'name' => $category,
                    'user_id' => $user->id,
                    'icon' => $expenseIcons[$index],
                    'icon_color' => $expenseIconsColor[$index],
                    'bg_color' => $expenseBgColor[$index],
                ]);
            }
        });
    }
}
