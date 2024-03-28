<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Job_Application extends Model
{
	protected $table = "job_applications";
    use Notifiable;
}