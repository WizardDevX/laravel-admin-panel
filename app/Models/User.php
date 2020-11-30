<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    function getAuthIdentifier()
    {
        return $this->correo;
    }

    function getAuthIdentifierName()
    {
        return 'correo';
    }

    function getAuthPassword()
    {
        return $this->contraseña;
    }

    function getRememberToken()
    {
        return $this->remember_token;
    }

    function setRememberToken($value)
    {
        $this->remember_token = $value;

        return;
    }

    function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'correo', 'contraseña', 'email_verified_at', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contraseña', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
