<?php

namespace App;
use Eloquent;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Eloquent implements Authenticatable
{
    use AuthenticableTrait;
    protected $hidden = [
        'user_id',
    ];

    protected $fillable = [
        'user_id','country','image',
    ];

}
