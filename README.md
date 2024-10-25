# budget-tracker quick start

1. composer install

2. php artisan key:generate

3. php artisan storage:link

4. php artisan migrate

5. php artisan coinKeeper:fresh

6. npm i

7. npm run build

STEPS TO RUN THE PROGRAM

9. php artisan serve

10. php artisan queue:work


bus labi!


#  email verification:
- uncomment lines in app/Models/User.php and app/Providers/Filament/AdminPanelProvider.php
- do not forget to set up mail in .env file

if some errors, try this:
composer require livewire/livewire
php artisan vendor:publish --force --tag=livewire:assets
