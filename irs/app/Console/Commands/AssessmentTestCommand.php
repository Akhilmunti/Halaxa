<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AssessmentTestServices;

class AssessmentTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getTestList';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Using this command we are grtting list of assessment tests from expert rating. this will run monthly.';

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
        //this will store all the tests called on assessment test service.
        $this->assessmentTestService->store_tests();
    }
}
