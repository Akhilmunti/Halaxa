<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Notifications\Notifiable;
class image extends Model
{
	 public $timestamps = false;
   protected $table = "images";
    use Notifiable;

    public function users() {
        return $this->BelongsTo('App\User');
    }

}