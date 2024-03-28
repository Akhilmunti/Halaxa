<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User_Nationality extends Model
{
    use Notifiable;
    protected $table = "user_nationality";
}
