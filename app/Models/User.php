<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Tymon\JWTAuth\Contracts\JWTSubject; //-----------------------JWT--------------

class User extends Authenticatable implements JWTSubject  //---implements for JWT-----------------
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getJWTIdentifier() {  //-------------JWT-----------
        return $this->getKey();
    }

    public function getJWTCustomClaims() {  //---------------JWT--------
        return [];
    }

    public function role(){    //--------------------Elouquent rel.-----

        return $this->hasOne('App\Models\Role','role_id','role_id');
    }
}
