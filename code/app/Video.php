<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Video extends Model
{
    public function scopeSearch($query, $cari){
    	return $query->where('judul','like','%' .$cari. '%');
    }
    public function tags()
    {
    return $this->morphToMany('App\Tag', 'taggable');
	}

}
