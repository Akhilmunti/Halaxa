<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Schools extends Model {

    use Notifiable;

    protected $table = "school_info";

}
