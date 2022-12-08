<?php

namespace App\Console;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\MakeMonthlyReport::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('backup:run --only-db')->dailyAt('01:00')->emailOutputTo('tech@tafseel.net');
        $schedule->command('backup:clean')->dailyAt('01:00')->emailOutputTo('tech@tafseel.net');
        $schedule->command('optimize')->daily()->emailOutputTo('tech@tafseel.net');
        $schedule->command('monthly:Report')->monthlyOn(1, '2:00')->emailOutputTo('tech@tafseel.net'); // day 1 on 2 hours on night
        $schedule->command('schedule:clear-cache')->dailyAt('01:00')->emailOutputTo('tech@tafseel.net'); // day 1 on 2 hours on night
        $schedule->command('cart:notification')->dailyAt('17:00')->emailOutputTo('tech@tafseel.net'); // day 1 on 2 hours on night
        $schedule->command('open:shops')->dailyAt('17:00')->emailOutputTo('tech@tafseel.net'); // day 1 on 2 hours on night

        // $schedule->command('inspire')->hourly();
        // $schedule->command('monthly:Report')->everyFiveMinutes();
        // $schedule->command('monthly:Report')->monthlyOn(1, ’15:00′); // day 1 on 13 hours
        // $schedule->command('backup:run --only-db')->hourly();
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
