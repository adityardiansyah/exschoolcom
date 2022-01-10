<?php


Route::get('storage/{folder}/{foldername}/{filename}', function ($folder,$foldername,$filename){
    $path = storage_path('app/' . $folder . '/' .$foldername. '/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});

Route::get('/', 'HomeController@index');

Route::get('/sitemap', 'SitemapController@index');
Route::get('/sitemap/posts', 'SitemapController@posts');
Route::get('/sitemap/categories', 'SitemapController@categories');
Route::get('/sitemap/event', 'SitemapController@event');
Route::get('/sitemap/author', 'SitemapController@author');
// Route::get('/sitemap/forum', 'SitemapController@forum');

Route::get('/post/{id}', 'HomeController@post');
Route::get('/artikel/{slug}', ['as' => 'web.post', 'uses' => 'HomeController@detailArtikel'])
            ->where('slug', '[\w\d\-\_]+');
Route::get('/home', 'HomeController@home');
Route::get('/article', 'HomeController@blog');

// Route::post('/subscribe', 'HomeController@subscribe');
Route::get('/artikel', 'HomeController@artikel');
Route::get('/category/{slug}', 'HomeController@categorySlug');
Route::get('/author/{id}', 'HomeController@authorName');
Route::get('/event-login', function(){
  return view('event.login');
});

//EVENT---
Route::get('/event/{slug}', 'HomeController@eventSlug');
Route::get('/event', 'HomeController@event');
Route::get('/category-event/{slug}', 'HomeController@CategoryEvent');


Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard/event', function(){
        $set = 'Kalian bisa berkarya untuk anak bangsa agar ilmu kalian bermanfaat';
	    return view('event.create-event', compact('set'));
	});

	Route::post('/dashboard/event', 'HomeController@SimpanEvent');
	Route::get('/dashboard/profile', 'UserController@profile');
	Route::post('/dashboard/profile', 'UserController@update_avatar');
	Route::get('/dashboard/event-user', 'profileController@daftarEvent');
	Route::get('/dashboard/event-user/{id}', 'profileController@hapusEvent');
	Route::get('/dashboard/article-user', 'profileController@article');
	Route::get('/dashboard/article-user/{id}', 'profileController@articleDelete');
	Route::get('/dashboard/create-article', 'profileController@create');
	Route::post('/dashboard/create-article', 'profileController@store');
	Route::get('/dashboard/edit-profil/{id}', 'profileController@edit_profil');
	Route::put('/dashboard/edit-profil/{id}', 'profileController@simpan_edit_profil');
	Route::get('/dashboard/edit-avatar/{id}', 'profileController@edit_avatar');
});


//Forum
//   Route::get('/panduan-forum', function(){
// 	return view('web.panduan-forum');
// });


// Route::get('/konfirmasi', 'HomeController@kon');
// Route::get('/selamat-bergabung', 'HomeController@gabung');
// Route::get('/video', 'HomeController@video');
// Route::get('/video/{slug}', ['as' => 'web.lihat-video', 'uses' => 'HomeController@lihat'])
//             ->where('slug', '[\w\d\-\_]+');
// Route::get('/tag-video/{slug}', 'HomeController@videoTag');
// Route::get('/tags/{slug}', 'HomeController@TagSlug');

Route::get('/about', function(){
    $set = 'Kalian bisa berkarya untuk anak bangsa agar ilmu kalian bermanfaat';
	return view('web.about', compact('set'));
});
Route::get('/contact', function(){
    $set = 'Kalian bisa berkarya untuk anak bangsa agar ilmu kalian bermanfaat';
	return view('web.contact', compact('set'));
});
Route::get('/layanan-jasa', function(){
    $set = 'Kalian bisa berkarya untuk anak bangsa agar ilmu kalian bermanfaat';
	return view('web.layanan-jasa', compact('set'));
});
Route::get('/privacy-policy', function(){
    $set = 'Kalian bisa berkarya untuk anak bangsa agar ilmu kalian bermanfaat';
	return view('web.privacy-policy', compact('set'));
});
Route::get('/publikasi-event', function(){
    $set = 'Kalian bisa berkarya untuk anak bangsa agar ilmu kalian bermanfaat';
	return view('web.publikasi-event', compact('set'));
});
Route::get('/panduan-publikasi-artikel', function(){
    $set = 'Kalian bisa berkarya untuk anak bangsa agar ilmu kalian bermanfaat';
	return view('web.panduan-publikasi-artikel', 'set');
});


//TOKO
// Route::get('/product/{slug}', 'ProductController@show');

Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Auth::routes();


// Route::get('/quiz', 'HomeController@quiz');


Route::get('/email', function(){
	return view('emails.activation');
});


//Voting
// Route::get('/voting', 'VotingController@index');
// Route::post('/kirim-voting','VotingController@store');
