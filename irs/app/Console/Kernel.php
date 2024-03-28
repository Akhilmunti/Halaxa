<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\AssessmentTestServices;

class Kernel extends ConsoleKernel
{

    /**

     * The Artisan commands provided by your application.

     *

     * @var array

     */

    protected $commands = [
        //register your command here...
        Commands\postJobOnNaukari::class,
        Commands\GetTestResultCommand::class,
        Commands\AssessmentTestCommand::class,
    ];



    /**

     * Define the application's command schedule.

     *

     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule

     * @return void

     */

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            Log::info('Testing scheduler: ' . date("d/m/Y h:i:sa"));
            })->everyMinute();
        $schedule->command('notify:getTestResults')->everyMinute();
        $schedule->command('notify:postjob')->everyThirtyMinutes();
        $schedule->command('command:getTestList')->monthly();
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

