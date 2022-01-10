<?php

namespace App;
use App\Post;

use Illuminate\Database\Eloquent\Model;

class Model
{
  public static function post(array $post = [])
  {
      return self::makeModel(Post::class, $post);
  }
}
