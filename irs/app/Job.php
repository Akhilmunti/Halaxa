<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $table = "jobs";
    protected $primaryKey = "id";
	protected $casts = ['id' => 'string'];
    protected $fillable = [
        'jobtitle',
    ];


}
