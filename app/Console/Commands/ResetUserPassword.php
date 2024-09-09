<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:reset-password {name} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manually reset a user\'s password by providing their name and a new password';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get name and password from the arguments
        $name = $this->argument('name');
        $newPassword = $this->argument('password');

        // Find the user by name
        $user = User::where('name', $name)->first();

        // Check if user exists
        if (!$user) {
            $this->error('User not found.');
            return 1; // Return an error code
        }

        // Update the user's password
        $user->password = Hash::make($newPassword);
        $user->save();

        // Output success message
        $this->info('Password reset successfully for user: ' . $user->name);

        return 0; // Return success code
    }
}
