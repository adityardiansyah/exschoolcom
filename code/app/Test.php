<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'result'];

    public function userId()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
