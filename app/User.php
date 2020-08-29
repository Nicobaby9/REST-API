<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Role;
use App\Admin;
use App\Mahasiswa;

 
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role_id'
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function roles() {
        return $this->hasOne(Role::class);
    }

    public function admins() {
        return $this->hasOne(Admin::class);
    }

    public function mahasiswas() {
        return $this->hasOne(Mahasiswa::class);
    }

    public function isAdmin() {
        if ($this->role_id == 2) {
            return true;
        }
        return false;
    }

    public function isMahasiswa() {
        if ($this->role_id == 1) {
            return true;
        }
        return false;
    }
}
