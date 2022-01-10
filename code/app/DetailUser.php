<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DetailUser extends Model
{
  	public function UsersId()
  	{
  		return $this->belongsTo("App\User");
  	}
}
