<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class test_tracking extends Model
{
    protected $table = "test_tracking";
    protected $casts = ['id' => 'string'];
    /**
       * The name of the "created at" column.
       *
       * @var string
       */
      const CREATED_AT = 'createdts';
    
      /**
       * The name of the "updated at" column.
       *
       * @var string
       */
      const UPDATED_AT = 'updatedts';
      
    use Notifiable;
}
