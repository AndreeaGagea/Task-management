<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';
    
    public function isAdmin()    {        
    return $this->type === self::ADMIN_TYPE;    
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'city', 'phone_number', 'password', 'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function project()
    {
        return $this-belongsToMany('App\Project');
    }
}
