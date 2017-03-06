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
		Commands\Grabber::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
		$logPath = storage_path('logs/schedule_log.txt');
		$schedule->command('grabber:match 1 1 1 _russiapl 1768')
			->hourly()
			->appendOutputTo($logPath);
		$schedule->command('grabber:match 2 2 1 _england 1764')
			->hourly()
			->appendOutputTo($logPath);
		$schedule->command('grabber:match 3 3 1 _spain 1782')
			->hourly()
			->appendOutputTo($logPath);
		$schedule->command('grabber:match 4 4 1 _italy 1780')
			->hourly()
			->appendOutputTo($logPath);
		$schedule->command('grabber:match 5 5 1 _germany 1778')
			->hourly()
			->appendOutputTo($logPath);
		$schedule->command('grabber:match 6 6 1 _france 1784')
			->hourly()
			->appendOutputTo($logPath);
		$schedule->command('grabber:match 8 6 1 _ukraine 1972')
			->hourly()
			->appendOutputTo($logPath);
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
