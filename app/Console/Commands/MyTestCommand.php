<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mytestcommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Displaying my test command';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \DB::table('cron_test')->insert(['my_value' => 'asdf']);
    }
}
