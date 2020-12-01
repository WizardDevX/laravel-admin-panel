<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    function getAuthIdentifier()
    {
        return $this->email;
    }

    function getAuthIdentifierName()
    {
        return 'email';
    }

    function getAuthPassword()
    {
        return $this->password;
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
        'name', 'email', 'password', 'email_verified_at', 'role'
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

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, $this->name));
    }
}
