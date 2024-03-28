<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Services\AssessmentTestServices;

class GetTestResultCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:getTestResults';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Js Test results every day.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->assessmentTestService = new AssessmentTestServices();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //code here..
        $this->assessmentTestService->getAllUserTestResults();
    }
}
