<?php

namespace App;
use App\PostCategory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function postcategories()
    {
        return $this->belongsTo('App\PostCategory', 'category_id');
    }

}
