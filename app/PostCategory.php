<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    public function postcategory()
    {
        return $this->belongsTo('App\Post');
    }
}
