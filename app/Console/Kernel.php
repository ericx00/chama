<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        // Explicitly register migration commands
        if (class_exists('Illuminate\Database\Console\Migrations\MigrationRepositoryTable')) {
            $this->load(__DIR__.'/../../../vendor/laravel/framework/src/Illuminate/Database/Console/Migrations');
        }

        require base_path('routes/console.php');
    }
}
