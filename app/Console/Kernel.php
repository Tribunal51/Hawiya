<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Commands\DecrementOrderTimeDaily::class,
        Commands\CheckOrderDate::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        //$schedule->call($this->decrementOrderDays())->daily();
        $schedule->call(function() {
            $user = User::find(2);
            $user->admin = !$user->admin;
            $user->save();
        })->everyMinute();

        // $schedule->command('decrement:ordertime')->everyMinute();
        $schedule->command('check:orderdate')->daily();

        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }


    
}
