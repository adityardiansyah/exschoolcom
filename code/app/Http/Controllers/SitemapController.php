<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Event;
use App\User;
use DevDojo\Chatter\Models\Discussion;

class SitemapController extends Controller
{
   	public function index()
   	{
   		$post = Post::orderBy('updated_at', 'DESC')->first();
	  	$kategori = Category::orderBy('updated_at', 'DESC')->first();
	  	$event = Event::orderBy('updated_at','DESC')->first();

		  return response()->view('sitemap.index', [
		    'post' => $post,
		    'kategori' => $kategori,
		    'events' => $event
		  ])->header('Content-Type', 'text/xml');
	}

	public function posts()
	{
	  $posts = Post::all();
	  return response()->view('sitemap.posts', [
	    'posts' => $posts,
	  ])->header('Content-Type', 'text/xml');
	}

	public function categories()
	{
	  $categories = Category::all();
	  return response()->view('sitemap.categories', [
	    'categories' => $categories,
	  ])->header('Content-Type', 'text/xml');
	}

	public function event()
	{
	  $events = Event::all();
	  return response()->view('sitemap.event', [
	    'events' => $events,
	  ])->header('Content-Type', 'text/xml');
	}

	public function author()
	{
	  $users = User::all();
	  return response()->view('sitemap.author', [
	    'users' => $users,
	  ])->header('Content-Type', 'text/xml');
	}

	public function forum()
	{
	  $discussions = Discussion::all();
	  return response()->view('sitemap.forum', [
	    'discussions' => $discussions,
	  ])->header('Content-Type', 'text/xml');
	}
}
