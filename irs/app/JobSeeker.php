<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Notifications\Notifiable;
class JobSeeker extends Model
{
	 public $timestamps = false;
   protected $table = "job_seeker";
    use Notifiable;
}
   

