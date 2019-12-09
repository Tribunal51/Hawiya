<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable implements MustVerifyEmail
//class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'lang', 'password', 'google_id'
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
        'admin' => 'boolean',
        'designer' => 'boolean',
        'sales_admin' => 'boolean',
        'printing_admin' => 'boolean',
        'store_admin' => 'boolean'
    ];

    public function setPasswordAttribute($pass) {
        $this->attributes['password'] = $pass;
        //$this->attributes['password'] = Hash::make($pass);
        //$this->attributes['password'] = Hash::needsRehash($pass) ? Hash::make($pass) : $pass;
    }

    public function issues() {
        return $this->hasMany('App\Issue', 'user_id');
    }
}
