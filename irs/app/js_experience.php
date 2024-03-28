<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class js_experience extends Model
{

protected $table = "js_experience";

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

    protected $primaryKey = "id";
  protected $casts = ['id' => 'string'];

}