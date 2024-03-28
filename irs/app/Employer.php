<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use Notifiable;
    public $timestamps = false;
    protected $table = "employer";
    protected $primaryKey = "id";
}
