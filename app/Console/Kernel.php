<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
//        'App\Console\Command\MyTestCommand'
             Commands\BlinqArchive::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {
         $schedule->command('mytestcommand')->everyMinute();
         $schedule->command('blinq:archive')->everyMinute();

//        $schedule->call(function () {
//            \DB::table('cron_test')->insert(['my_value' => 'asdf']);
//        })->everyMinute();
    }

}
