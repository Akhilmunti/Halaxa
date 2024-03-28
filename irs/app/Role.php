<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Notifiable;
    protected $primaryKey = "role_id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'role_name', 'role_desc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* protected $hidden = [
        'password', 'remember_token',
    ]; */

    public function users()
    {
        return $this->belongsToMany('App\User', 'users_role', 'role_id', 'user_id');
    }

}
