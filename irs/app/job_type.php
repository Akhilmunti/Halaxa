<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class job_type extends Model
{
    use Notifiable;
    protected $table = "job_types";
}