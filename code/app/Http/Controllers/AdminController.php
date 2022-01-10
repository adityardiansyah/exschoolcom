<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use Auth;
use Date;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function post()
    {
        $data = Post::all();
        return view('admin.post', compact('data'));
    }

    public function uploadArticle()
    {
        $category = Category::all();
        return view('admin.upload-article', compact('category'));
    }

    public function savePost(Request $request)
    {
        $tgl = str_replace('/','-',$request->published_at);
        $post = new Post();
        // $post->author_id = Auth::user()->id;
        $post->author_id = 1;
        $post->category_id = $request->input('category');
        $post->title = $request->input('title');
        $post->seo_title = $request->input('seo_title');
        $post->excerpt = null;
        $post->body = $request->input('body');
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->status = $request->input('status');
        $post->featured = $request->featured;
        $post->published_at = date('Y-m-d H:i:s', strtotime($tgl));
        $post->view = 0;

        if(empty($request->slug)){
            $post->slug = str_slug($post->title);
        }else{
            $post->slug = $request->slug;
        }
        if($request->hasFile('image')){
            if(Storage::exists($post->image)){
                Storage::delete($post->image);
            }
            $filename = str_random(10).'_'.date('Ymd');
            $extension = $request->file('image')->extension();
            $mount = date('MY');
            $filepath = Storage::putFileAs('posts/'.$mount, $request->image, $filename.'.'.$extension);
            $post->image = $filepath;
        }
        $post->save();


        return redirect()->route('post')
        ->with('type','success')
        ->with('message','Berhasil di Upload');
    }

    public function deletePost($id)
    {
        $delete = Post::find($id);
        if(Storage::exists($delete->image)){
            Storage::delete($delete->image);
        }
        $delete->delete();

        return redirect()->back()
        ->with('type','success')
        ->with('message','Berhasil di Hapus');
    }
}