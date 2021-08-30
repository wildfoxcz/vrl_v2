<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function races()
    {
        return $this->belongsToMany(Race::class, "races_users")->withPivot('points', 'penalty_points');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function user_detail()
    {
        return $this->hasOne(UserDetail::class);
    }


    public function isAuthorised($requiredRole)
    {
        return $this->role->searchInHiearchy($requiredRole);
    }

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
