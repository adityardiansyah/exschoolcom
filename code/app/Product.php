<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoriesProduct;


class Product extends Model
{
    public function categoriesProductId()
    {
    	return $this->belongsTo('App\CategoriesProduct');
    }
}
