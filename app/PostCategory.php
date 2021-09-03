<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Post','post_id');
    }
}
