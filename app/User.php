<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password', 'gender_id', 'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_users', 'user_id', 'role_id');
    }

    /* Se o User logado tem uma das roles em questão */
    public function temQualquerRoles($roles)
    {
        if ($this->roles()->whereIn('type', $roles)->first()) {
            return true;
        }

        return false;
    }

    /* Se o User logado tem a role em questão */
    public function temRole($role)
    {
        if ($this->roles()->where('type', $role)->first()) {
            return true;
        }

        return false;
    }
}
