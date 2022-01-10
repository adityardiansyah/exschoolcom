<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function namaVoteId(){
    	return $this->belongsTo('App\NamaVote');
    }
}
