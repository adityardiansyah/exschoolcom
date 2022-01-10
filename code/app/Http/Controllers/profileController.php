<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Illuminate\Support\Str;
use App\Event;
use App\User;
use Auth;
use App\Post;
use App\DetailUser;
use SEOMeta;
use OpenGraph;
use DateTime;


class profileController extends Controller
{
    public function daftarEvent()
    {
      $auth = Auth::user()->id;
    	$event = Event::where('author_id', '=', $auth)->get();
      SEOMeta::setTitle('Publikasi Event ');
      SEOMeta::setDescription('Media Edukasi, Informasi dan Partner Event Dunia Sekolah dan Luar Sekolah, Tempat berkarya anak bangsa untuk membagikan ilmunya & Uploud Event secara GRATIS');
      SEOMeta::setCanonical('https://ex-school.com');

      OpenGraph::setDescription('Media Edukasi, Informasi dan Partner Event Dunia Sekolah dan Luar Sekolah, Tempat berkarya anak bangsa untuk membagikan ilmunya & Uploud Event secara GRATIS');
      OpenGraph::setTitle('Publikasi Event');
      OpenGraph::setUrl('http://ex-school.com');
      OpenGraph::addProperty('type', 'website');

    	//$events = Event::where('id', '=', Auth::user()->id)->first();
    	return view('profile.lihat-event',  compact('event'));
    }
    public function hapusEvent($id)
    {
      $event = Event::where('id', '=', $id)->delete();
      if($event){
        return redirect('/dashboard/event-user')->with('berhasil','Event Berhasil dihapus !');
      } else {
        return redirect('/dashboard/event-user')->with('gagal','Event Gagal dihapus !');
      }

    }

    public function article()
    {
    	$auth = Auth::user()->id;
      $post = Post::where('author_id', '=', $auth)->get();

    	return view('profile.lihat-artikel', compact('post'));
    }
    public function articleDelete($id)
    {
    	$post = Post::where('id', '=', $id)->delete();

    	if($post){
    		return redirect('/dashboard/article-user')->with('berhasil','Artikel Berhasil dihapus !');
    	} else {
    		return redirect('/dashboard/article-user')->with('gagal','Artikel Gagal dihapus !');
    	}

    }

    public function create()
    {
      SEOMeta::setTitle('Publikasi Event ');
      SEOMeta::setDescription('Media Edukasi, Informasi dan Partner Event Dunia Sekolah dan Luar Sekolah, Tempat berkarya anak bangsa untuk membagikan ilmunya & Uploud Event secara GRATIS');
      SEOMeta::setCanonical('https://ex-school.com');

      OpenGraph::setDescription('Media Edukasi, Informasi dan Partner Event Dunia Sekolah dan Luar Sekolah, Tempat berkarya anak bangsa untuk membagikan ilmunya & Uploud Event secara GRATIS');
      OpenGraph::setTitle('Publikasi Event');
      OpenGraph::setUrl('http://ex-school.com');
      OpenGraph::addProperty('type', 'website');
    	return view('profile.create-article');
    }

    public function store(Request $request)
    {
    	$post = new Post();
     	$post->author_id = Auth::user()->id;
      	$post->category_id = $request->input('category_id');
  		$post->title = $request->input('title');
  		$post->seo_title = $request->title;
  		$post->excerpt = $request->input('exceprt');
  		$post->body = $request->input('body');

      $file = $request->file('image')->store('posts','public');


      $post->image = $file;
      $post->slug = str_slug($request->title);
      $post->meta_description = $request->exceprt;
      $post->meta_keywords = $request->input('meta_keywords');
      $post->status = 'PENDING';
      $post->featured = '0';

      $post->save();

      return redirect('/dashboard/article-user')->with('berhasil','Terima Kasih telah menulis Artikel di EX - School, Artikel masih di Periksa oleh Moderator, Jika sudah kami akan mengkonfirmasi artikel anda lewat E-mail anda!');

    }
    public function edit_profil($id)
    {
      $id_user = Auth::user()->id;
      $duser = DetailUser::where('users_id','=',$id_user)->first();
      $user = User::where('id','=',$id_user)->first();

      return view('profile.edit-profile', compact('user', 'duser'));
    }
    public function simpan_edit_profil(Request $request, $id)
    {
      $duser = DetailUser::find($id);

      $date = date("Y-m-d", strtotime($request->input('tgl_lahir')));
      $duser->tgl_lahir = $date;
      $duser->telepon = $request->input('telepon');
      $duser->asal_sekolah = $request->input('asal_sekolah');
      $duser->tentang = $request->input('tentang');
      $duser->media_sosial =  $request->input('media_sosial');
      $duser->alamat = $request->input('alamat');
      $duser->save();

      $user = User::find($id);
      $user->name = $request->input('name');
      $user->save();

      return redirect('/dashboard/edit-profil/'.$id)->with('Berhasil','Edit Profil Berhasil !');
    }
    public function edit_avatar($id)
    {
      $user = User::find($id);

      return view('profile.ganti-avatar', compact('user'));
    }
}
