<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AssessmentTest extends Model
{
    //
    protected $table = 'tests';
    protected $primaryKey = 'id';
    public $incrementing = false;
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
}
