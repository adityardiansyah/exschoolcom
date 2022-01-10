<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
 	public function eventCategoryId(){

      return $this->belongsTo('App\EventCategory');
    }   
    public function authorId(){

      return $this->belongsTo('App\User');
    }  
}
