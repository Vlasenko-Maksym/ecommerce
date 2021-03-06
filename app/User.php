<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    const ROLE_ADMIN = 'admin';
    const ROLE_CUSTOMER = 'customer';
    // const SEX = ['FEMENINO','MASCULINO'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    protected $fillable = [
        'name', 'email', 'password', 'avatar','gender','role',
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

    public function isAdmin(){
      return $this->role == self::ROLE_ADMIN;
    }

    public static function getRoles()
    {
      return [
        self::ROLE_ADMIN => 'admin',
        self::ROLE_CUSTOMER => 'customer',
      ];
    }
// Relaciones 

    public function carts(){
      return $this->hasMany('\App\Cart', 'userId');
    }
}
