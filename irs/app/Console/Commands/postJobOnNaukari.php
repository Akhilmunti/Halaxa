<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Auth;
use App\Services\Stub;
use Illuminate\Support\Facades\DB;
use App\Services\UtilityServices;
use Illuminate\Support\Facades\Log;
use App\Notifications\UserNotifications;
use Session;
use Constants;
class postJobOnNaukari extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:postjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Post UnPosted Job on Naukari every hour.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->utility_services = new UtilityServices();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //code here..
        Log::info('postJobOn Naukari on command handle function started.');
        $jobids = DB::select("SELECT  jobid  FROM job_board_mapping   WHERE boardid = 2 and isactive = 1 and is_PostedOn_board = 0");
        foreach ($jobids as $jobids ) {
              // print_r($jobids->jobid);
               $jobsdata = $this->utility_services->createJsonForJobs($jobids->jobid);
                print_r($jobsdata); 
                $Stub= new Stub(Constants::N_PASSWORD,"appKey");
                $apiAddressPost="https://rms.naukri.com/v1/recruiterApi/requirements/8cUk0";
                $requirementData= $jobsdata;
                $Stub->addRequirement($apiAddressPost, $requirementData, 1);
                DB::table('job_board_mapping')
                ->where('jobid', $jobids->jobid)
                ->where('isactive', 1)
                ->where('boardid', 2)
                ->update(['is_PostedOn_board' => 1]);
        
        }
        Log::info('postJobOn Naukari on command handlefunction ended.');
        
    }
}
