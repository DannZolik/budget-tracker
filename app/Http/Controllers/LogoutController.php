<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Filament\Http\Controllers\Auth\LogoutController as FilamentLogoutController;

class LogoutController extends FilamentLogoutController
{
    public function logout(Request $request)
    {
        Filament::auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Notification::make()
            ->title('Logged out successfully!')
            ->success()
            ->send();

        return redirect()->route('landing-page');
    }
}