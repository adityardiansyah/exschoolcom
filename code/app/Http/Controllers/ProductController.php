<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\CategoriesProduct;

class ProductController extends Controller
{
    public function show($slug)
    {
    	$produk = Product::where('slug','=',$slug)->first();
    	$id = $produk['categories_product_id'];
    	$category = CategoriesProduct::where('id', '=', $id)->first();

    	return view('shop.lihat-produk', compact('produk', 'category'));
    }
}
