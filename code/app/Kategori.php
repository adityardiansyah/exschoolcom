<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function Video(){
    	return $this->belongsTo('App\Video');
    }
}
