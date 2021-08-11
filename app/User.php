<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function races()
    {
        return $this->belongsToMany(Race::class)->withPivot('points', 'penalty_points');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // ---
    public function isAuthorised($requiredRole)
    {
        return $this->role->searchInHiearchy($requiredRole);
    }

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
