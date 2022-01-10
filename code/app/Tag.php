<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    public function videos(){
    	return $this->morphToMany('App\Video', 'taggable');
    }
}
