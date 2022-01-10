<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Illuminate\Support\Str;
use Auth;
use App\Post;
use App\Category;
use App\Subscribe;
use Mail;
use File;
use App\Mail\Subscribes;
use App\Mail\SendMail;
use App\Video;
use App\VideosTag;
use App\Tag;
use App\User;
use App\Event;
use Mailchimp;
use App\Taggable;
use App\EventCategory;
use App\Product;
use Voyager;
use SEOMeta;
use OpenGraph;
use Twitter;

class HomeController extends Controller
{

    public function index()
    {
      $event = Event::where([
                            ['publish', '=', 'publish'],
                            ['tanggalPelaksanaan', '>=', date("Y/m/d")],
                            ])->orderBy('tanggalPelaksanaan','asc')->paginate(6);

      $event_kemarin = Event::where([
                            ['tanggalPelaksanaan', '<=', date("Y/m/d")],
                            ])
                            ->whereIn('publish', ['publish','utama'])
                            ->orderBy('tanggalPelaksanaan','desc')->paginate(4);
        $oneevent = Event::where([
                            ['publish', '=', 'iklan'],
                            ])->limit(1)->first();
        $marque = Event::where([
                              ['tanggalPelaksanaan', '>=', date("Y/m/d")],
                              ])
                              ->whereIn('publish', ['publish','utama'])
                              ->orderBy('tanggalPelaksanaan','desc')->limit(5)->get();
        $eventUtama = Event::where([
                              ['publish', '=', 'utama'],
                              ['tanggalBerakhir', '>=', date("Y/m/d")],
                              ])->orderBy('tanggalPelaksanaan','desc')->get();
      $topevent = Event::where([
        ['publish', '=', 'publish'],
        ])->orderBy('tanggalPelaksanaan','asc')->limit(3)->get();

      $posts = Post::where('status','=', 'PUBLISHED')->orderBy('id','desc')->paginate(8);

      $postPilihan = Post::where([
                                  ['status','=','PUBLISHED'],
                                  ['featured','=','1'],
                                  ])->orderBy('view','desc')->limit(3)->get();

        $toppost = Post::where('status','=', 'PUBLISHED')
                        ->orderBy('created_at','desc')->limit(3)->get();
      $tips = Post::where(
                        [ ['status','=', 'PUBLISHED'],
                          ['category_id', '=', '11'],
                        ])->orderBy('view','decs')->limit(3)->get();


      $produk = Product::limit(6)->get();

        SEOMeta::setTitle('Home ');
        SEOMeta::setDescription('Media Edukasi, Informasi dan Partner Event Dunia Sekolah dan Luar Sekolah, Tempat berkarya anak bangsa untuk membagikan ilmunya & Uploud Event secara GRATIS');
        SEOMeta::setCanonical('https://ex-school.com');

        OpenGraph::setDescription('Media Edukasi, Informasi dan Partner Event Dunia Sekolah dan Luar Sekolah, Tempat berkarya anak bangsa untuk membagikan ilmunya & Uploud Event secara GRATIS');
        OpenGraph::setTitle('Home');
        OpenGraph::setUrl('http://ex-school.com');
        OpenGraph::addProperty('type', 'website');

      return view('web.index', compact('posts', 'event','postPilihan', 'produk', 'toppost','tips','event_kemarin', 'oneevent','marque','eventUtama','topevent'));
    }

    public function home()
    {
      return view('/');
    }

    public function post($id)
    {
      $category = Post::find($id)->category;
      $post = Post::find($id);
      $title = Post::all();
      $set = $post->meta_description;

      SEOMeta::setTitle('Artikel | Belajar dan Update Wawasan seputar dunia Sekolah - Ex-school.com');
      SEOMeta::setDescription('Kumpulan artikel seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
      SEOMeta::setCanonical('https://ex-school.com/article');

      OpenGraph::setDescription('Kumpulan artikel seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
      OpenGraph::setTitle('Artikel');
      OpenGraph::setUrl('http://ex-school.com/article');
      OpenGraph::addProperty('type', 'website');

      return view('web.post', compact('category', 'post', 'set'));
    }

    public function detailArtikel($slug)
    {
      $cat = Post::where('slug', '=', $slug)->first();

      $id = $cat['category_id'];
      $id_user = $cat['author_id'];
      $idpost = $cat['id'];
      // $find = Post::find($idpost);
      // $find->increment('view');

      $category = Category::find($id);
      $author = User::find($id_user);

      $postTerbaru = Post::where([['category_id', '=', $id],
                                  ['status','=','PUBLISHED']])->inRandomOrder()->limit(3)->get();
      $post = Post::where('slug', '=', $slug)->first();
      $post->view = $post->view + 1;
      $post->save();
      $posts = Post::where('status','=','PUBLISHED')->inRandomOrder()->limit(12)->get();
      $postTerkait = Post::where([['category_id', '=', $id],
                                  ['status','=','PUBLISHED']])->inRandomOrder()->limit(5)->get();
      // $set = $post->meta_description;

      SEOMeta::setTitle($post->title);
      SEOMeta::setDescription($post->meta_description);
      SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
      SEOMeta::addMeta('article:section', $category->name, 'property');
      SEOMeta::addKeyword($post->meta_keywords);

      OpenGraph::setDescription($post->meta_description);
      OpenGraph::setTitle($post->title);
      OpenGraph::setUrl('https://ex-school.com/',$post->slug);
      OpenGraph::addProperty('type', 'article');
      OpenGraph::addProperty('locale', 'pt-br');
      OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);
      OpenGraph::addImage(['url' => $post->image, 'size' => 300]);
      OpenGraph::addImage($post->image, ['height' => 300, 'width' => 300]);

      Twitter::addValue('artikel', $post->meta_keyword)
            ->setType('summary')
            ->addImage($post->image)
            ->setTitle($post->title)
            ->setDescription($post->meta_description)
            ->setUrl('https://ex-school.com/'.$post->slug)
            ->setSite('www.ex-school.com');

      return view('web.post', compact('post', 'category','posts','author', 'postTerbaru', 'postTerkait'));
    }

    public function authorName($id)
    {
      $user = User::where('id','=', $id)->first();
      $post = Post::where('author_id','=', $id)->paginate(12);

      SEOMeta::setTitle('Profil | Indahnya berbagi Ilmu dan Informasi Sekolah!');
      SEOMeta::setDescription('Mari ikut berkontribusi untuk mencerdaskan anak bangsa ! - Ex-school');
      SEOMeta::setCanonical('https://ex-school.com');

      OpenGraph::setDescription('Mari ikut berkontribusi untuk mencerdaskan anak bangsa ! - Ex-school');
      OpenGraph::setTitle('Profil | Indahnya berbagi Ilmu dan Informasi Sekolah!');
      OpenGraph::setUrl('http://ex-school.com/author/{$id}');
      OpenGraph::addProperty('type', 'website');

      return view('web.profil', compact('user','post'));
    }

    public function blog()
    {
      $artikel = Post::where('status','=', 'PUBLISHED')->orderBy('created_at','desc')->paginate(8);


      SEOMeta::setTitle('Artikel | Belajar dan Update Wawasan seputar dunia Sekolah - Ex-school.com');
      SEOMeta::setDescription('Kumpulan artikel seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
      SEOMeta::setCanonical('https://ex-school.com/article');

      OpenGraph::setDescription('Kumpulan artikel seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
      OpenGraph::setTitle('Artikel');
      OpenGraph::setUrl('http://ex-school.com/article');
      OpenGraph::addProperty('type', 'website');

      return view('web.blog', compact('artikel'));
    }

    public function subscribe(Request $request)
    {
          $listId = '0e0bdc3dff';
          $email = request()->input('email');

          if(Mailchimp::check($listId, $email))
          {
            return redirect('/')->with('sudah', 'Anda sebelumnya sudah mendaftarkan Email anda.');
          }
          Mailchimp::subscribe(
            $listId,
            $email,
            [],
            false);
            $set = 'Temukan Event Sekolah yang Luar Biasa disini';

          return view('web.konfirmasi', compact('set'));

    }

    public function video(Request $request)
    {

        $tag = Tag::all();
        $cari = $request->input('cari');

        $video = Video::latest()->search($cari)->paginate(10);
        SEOMeta::setTitle('Video | Belajar dan Update Wawasan seputar dunia Sekolah - Ex-school.com');
        SEOMeta::setDescription('Kumpulan video seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
        SEOMeta::setCanonical('https://ex-school.com/video');

        OpenGraph::setDescription('Kumpulan video seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
        OpenGraph::setTitle('Artikel');
        OpenGraph::setUrl('http://ex-school.com/article');
        OpenGraph::addProperty('type', 'website');

        return view('web.random', compact('video','cari','tag'));
    }

    public function artikel(Request $request)
    {
        $post = Post::all();
        $cari = $request->input('cari');

        $artikel = Post::where([
                                ['title', 'like', '%'.$cari.'%'],
                                ['status','=','PUBLISHED'],
                                ])->orderBy('id','desc')->paginate(10);

        $artikel->Appends($request->only('cari'));

        SEOMeta::setTitle('Artikel | Belajar dan Update Wawasan seputar dunia Sekolah - Ex-school.com');
        SEOMeta::setDescription('Kumpulan artikel seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
        SEOMeta::setCanonical('https://ex-school.com/article');

        OpenGraph::setDescription('Kumpulan artikel seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
        OpenGraph::setTitle('Artikel');
        OpenGraph::setUrl('http://ex-school.com/article');
        OpenGraph::addProperty('type', 'website');

        return view('web.artikel', compact('cari','artikel','post'));
    }


    public function videoTag(Request $request, $slug)
    {
      $t = Tag::all();
      $cek = Tag::where('slug','=', $slug)->first();
      $qcek = $cek['id'];
      $tag = Tag::find($qcek);
      $tags = Taggable::join('videos', 'taggables.taggable_id', '=', 'videos.id')
            ->join('tags', 'taggables.tag_id', '=', 'tags.id')
            ->select('taggables.*', 'videos.*', 'tags.*')->where('tag_id', '=',$qcek)
            ->get();

      $cari = $request->input('cari');
      $video = Video::latest()->search($cari)->paginate(10);
      $set = 'Kalian bisa berkarya untuk anak bangsa agar ilmu kalian bermanfaat';

      return view('web.video', compact('tag','tags','cari','video', 't', 'set'));


    }
    public function TagSlug($slug)
    {
        $cek = Tag::where('slug','=', $slug)->first();
        $qcek = $cek['id'];
        $tag = Tag::find($qcek);
        $tags = Taggable::join('videos', 'taggables.taggable_id', '=', 'videos.id')
            ->join('tags', 'taggables.tag_id', '=', 'tags.id')
            ->select('taggables.*', 'videos.*', 'tags.*')->where('tag_id', '=',$qcek)
            ->get();
        $set = 'Kalian bisa berkarya untuk anak bangsa agar ilmu kalian bermanfaat';

        return view('web.tag', compact('tags', 'tag', 'set'));

    }

    public function lihat($slug)
    {
      $video = Video::where('slug', '=', $slug)->first();

      return view('web.lihat-video', compact('video'));
    }

    public function categorySlug($slug)
    {
      $category = Category::where('slug','=', $slug)->first();
      $id = $category['id'];

      $post = Post::where('category_id','=',$id)->orderBy('id','desc')->paginate(9);

      SEOMeta::setTitle('Kategori '.$category->name.' | Belajar dan Update Wawasan seputar dunia Sekolah - Ex-school.com');
      SEOMeta::setDescription('Kumpulan event seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
      SEOMeta::setCanonical('https://ex-school.com/category/'.$category->slug);

      OpenGraph::setDescription('Kumpulan event seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
      OpenGraph::setTitle('Kategori '.$category->name.' | Belajar dan Update Wawasan seputar dunia Sekolah - Ex-school.com');
      OpenGraph::setUrl('https://ex-school.com/category/'.$category->slug);
      OpenGraph::addProperty('type', 'website');

      return view('web.category', compact('category','post'));
    }

    public function eventSlug($slug)
    {
      $kat = Event::where('slug', '=', $slug)->first();
      $id = $kat['event_category_id'];
      $idUser = $kat['author_id'];
      $category = EventCategory::find($id);
      $author = User::find($idUser);
      $postTerbaru = Post::where('status','=','PUBLISHED')->orderBy('created_at','desc')->limit(1)->get();

      $eventUtama = Event::where([
                                  ['tanggalPelaksanaan', '>=', date("Y/m/d")],
                                  ['publish', '=' , 'utama']
                                  ])
                                  ->orderBy('tanggalPelaksanaan','asc')->limit(3)->get();
      $eventTerbaru = Event::where([
                                  ['tanggalPelaksanaan', '>=', date("Y/m/d")],
                                  ])
                                  ->whereIn('publish', ['publish','utama'])
                                  ->orderBy('tanggalPelaksanaan','asc')
                                  ->limit(3)->get();

      $events = Event::where([
                                  ['tanggalPelaksanaan', '>=', date("Y/m/d")],
                                  ])
                                  ->whereIn('publish', ['publish','utama'])
                                  ->orderBy('tanggalPelaksanaan','asc')->limit(5)->get();
      $event = Event::where('slug','=',$slug)->first();

      SEOMeta::setTitle($event->judul);
      SEOMeta::setDescription($event->deskripsi);
      SEOMeta::setCanonical('https://ex-school.com/event/'. $event->slug);
      SEOMeta::addKeyword('event sekolah, event ekstrakurikuler ,event paskibra,event pramuka,event pmr,event sekolah 2018,event sekolah sma');

      OpenGraph::setDescription($event->deskripsi);
      OpenGraph::setTitle($event->judul);
      OpenGraph::setUrl('https://ex-school.com/event/'. $event->slug);
      OpenGraph::addProperty('type', 'website');

      return view('web.event', compact('event','events','category','author', 'eventTerbaru','eventUtama','postTerbaru'));
    }
    public function event(Request $request)
    {
      $cari = $request->input('cari');

      $events = Event::where([
                      ['judul','like','%'.$cari.'%'],
                      ['tanggalBerakhir', '>=', date("Y/m/d")],
                      ])
                      ->whereIn('publish', ['publish','utama'])
                      ->orderBy('tanggalPelaksanaan','desc')
                      ->paginate(6);
      $event_kemarin = Event::where([
                      ['tanggalPelaksanaan', '<=', date("Y/m/d")],
                      ])
                      ->whereIn('publish', ['publish','utama'])
                      ->orderBy('tanggalPelaksanaan','desc')->paginate(8);

      SEOMeta::setTitle('Cari Event | Belajar dan Update Wawasan seputar dunia Sekolah - Ex-school.com');
      SEOMeta::setDescription('Kumpulan event seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
      SEOMeta::setCanonical('https://ex-school.com/event/{slug}');

      OpenGraph::setDescription('Kumpulan event seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
      OpenGraph::setTitle('Cari Event | Belajar dan Update Wawasan seputar dunia Sekolah - Ex-school.com');
      OpenGraph::setUrl('https://ex-school.com/events/');
      OpenGraph::addProperty('type', 'website');

      return view('web.events', compact('events','cari', 'event_kemarin'));



    }
    public function SimpanEvent(Request $request){

      $event = new Event();

      $event->author_id = Auth::user()->id;
      $event->event_category_id = $request->input('event_category_id');
      $event->judul = $request->input('judul');
      $event->slug = str_slug($request->judul);
      $event->deskripsi = $request->input('deskripsi');
      $event->status =1;
      $event->kouta = 1;
      $event->tanggalPelaksanaan = date("Y-m-d", strtotime($request->tanggalPelaksanaan));
      $event->tanggalBerakhir = date("Y-m-d", strtotime($request->tanggalBerakhir));
      $event->waktuPelaksanaan = 1;
      $event->kota = $request->input('kota');
      $event->lokasi = 1;
      $event->publish = 'pending';

      $this->validate($request, [
        'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ],[
        'poster.max' => 'Ukuran Poster maksimal 2mb'
      ]);
      if($request->hasFile('poster')){
        $image = $request->file('poster');
        $filename = str_random(20).'_'.$image->getClientOriginalName();
        $bulan = date('mY');
        //$destinationPath = public_path('events/');
        //$image->move($destinationPath, $filename);
        $extension = $request->file('poster')->getClientOriginalExtension();
        $filepath = Storage::putFileAs('events/'.$bulan ,$request->file('poster'), $filename.'.'.$extension);
        $file = $filepath;

        $event->poster = $file;
      }
      $event->save();
      $user = ['exschool.id@gmail.com'];
      Mail::send('emails.event-masuk', $user, function($message) use($user){
        $message->from('exschool.id@gmail.com', 'Official EX-School');
        $message->to($user, '')->subject('Ada Event Baru Cuyy...');

      });

      return redirect('/dashboard/event-user')
      ->with('message','Terima Kasih telah mengupload Event kamu di EX - School, Event masih diperiksa oleh Admin!  Silakan Konfirmasi di DM Instagram Kami @exschool_com untuk informasi langkah selanjutnya!')
      ->with('message_type','success');
    }
    public function dateFormat($date,$format){
      $date=date_create($date);
      $date_new=date_format($date,$format);
      return $date_new;
    }

    public function CategoryEvent($slug)
    {
      $category = EventCategory::where('slug','=', $slug)->first();
      $id = $category['id'];

      $events = Event::where([
                            ['event_category_id','=', $id],
                            ['publish', '=', 'publish'],
                            ['tanggalPelaksanaan', '>=', date("Y/m/d")],
                            ])->paginate(6);
      SEOMeta::setTitle($category->nama);
      SEOMeta::setDescription('Kumpulan event seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
      SEOMeta::setCanonical('https://ex-school.com/category-event/', $category->slug);

      OpenGraph::setDescription('Kumpulan event seputar dunia sekolah dan lulusan sekolah, informasi lowongan pekerjaan, motivasi sekolah, motivasi pendidikan, pengertian sekolah, belajar pelajaran sekolah');
      OpenGraph::setTitle($category->nama);
      OpenGraph::setUrl('https://ex-school.com/category-event/');
      OpenGraph::addProperty('type', 'website');

      return view('event.category-event', compact('events', 'category'));
    }










    // public function kon(){
    //   return view('web.konfirmasi');
    // }
    // public function gabung(){
    //   return view('web.gabung');
    // }
    // public function quiz(){
    //   return view('quiz.index');
    // }
}
