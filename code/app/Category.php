<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    protected $table = 'categories';

    public function post(){
      return $this->hasMany('App\Post');
    }
}
