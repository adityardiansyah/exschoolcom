<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\category;
use TCG\Voyager\Traits\Translatable;

class Post extends Model
{
  use Translatable;

    public function category(){

      return $this->belongsTo('App\Category');
    }
    public function post(){
        return $this->hasMany('App\Post');
    }
}
