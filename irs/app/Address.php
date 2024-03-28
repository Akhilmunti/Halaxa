<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Address extends Model
{
     use Notifiable;
    public $timestamps = false;
    protected $table = "address";
     protected $primaryKey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
   
}
