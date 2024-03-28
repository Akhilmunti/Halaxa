<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Jobs_seed_data extends Model
{
    //
    protected $table ="jobs_seed_data";
    use Notifiable;
}
