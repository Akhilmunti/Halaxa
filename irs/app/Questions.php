<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Questions extends Model
{
    protected $connection = 'mysql2';
    protected $table = "questions";
    use Notifiable;
}
