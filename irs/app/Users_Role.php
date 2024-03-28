<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Users_Role extends Model
{
    use Notifiable;
    protected $table = "users_role";
    protected $primaryKey = "urid";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'role_id',
    ];


     /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'users_role', 'user_id', 'role_id');
    }

      /**
     * The roles that belong to the user.
     */
    public function users() {
        return $this->belongsTo('App\User');
    }
}
