@extends('master')

@section('title','EX - School | Home')
@section('css')

@endsection
@section('content')
<div class="top64" >
  <div class="container-fluid" >
    <div class="row" style="background: #333;">
        <div class="col-md-8 header-kiri">
            <div class="text-center">
              <h1 class="header-title">EX - SCHOOL</h1>
              <p class="header-sub-title">Education, Information, and Partnership</p>

              <br/>
              <h3 style="color: #fff; font-family: Gotham-Rounded;">Upload Event Sekolah Kamu</h3>
              <a href="{{url('/dashboard/event')}}"><button class="btn-event"><i class="glyphicon glyphicon-share"></i> Upload Disini</button></a>
            </div>
        </div>
        <div class="col-md-4 header-kanan">

          <a href="https://www.instagram.com/exschool_com/" target="_blank">
          <img data-original="{{ asset('gambar/follow.png') }}" class="img-responsive" alt="" style="width:100%; margin-top:16px;">
          <!-- <div style="background: url(https://i.imgur.com/JMwGbPX.png) center center; height: 270px; margin-top: 20px; margin-bottom: 20px; background-size: cover; " class="img-responsive"></div> -->
          </a>

          <a href="{{ url('dashboard/event') }}">
            <img data-original="{{ asset('gambar/partner.png') }}" class="img-responsive" alt="" style="width:100%; margin-top:16px;">

          <!-- <div style="background: url(https://i.imgur.com/5oveGh3.png) center center; height: 270px; margin-top: 15px; margin-bottom: 15px; background-size: cover;" class="img-responsive"></div> -->
          </a>

        </div>
    </div>
  </div>


</div>
<div style="clear: both;"></div>
    <section style="background: #fff;">
    <br/>
      <div class="container">
        <div class="row">
          <div class="col-md-4">

              <a href="/" target="_blank">
                <img data-original="{{ asset('gambar/poster-promosi.png')}}" class="iklanevent" style="width:100%; height:auto;" alt="">
                <!-- <div class="iklanevent" style="background-image:url('storage/{{ $oneevent->poster }}')"></div> -->
              </a>
              <br>
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="marque">
                <div class="marque-title">
                  <b>Event Terbaru</b>
                </div>
                <marquee>
                  @foreach ($marque as $jalan)
                    <a href="{{ url('event/'.$jalan->slug) }}"><span style="margin-right:80px;">{{ $jalan->judul }}</span></a>
                  @endforeach
                </marquee>
              </div>
            </div>
            <br/>
            <div class="row">
              <div class="row">
                @foreach ($eventUtama as $top)
                  <div class="content-loop">
                    <div class="col-md-4">
                      <div class="frame-post">
                          <div class="event-img">
                            <a href="{{ url('event/'.$top->slug)}}">
                              <img data-original="{{ asset('storage/'.$top->poster)}}" alt="{{ $top->judul }}" class="img-responsive event-zoom" style="width: 100%;">
                            </a>
                          </div>
                          <div class="isi-event">
                            <h5><a href="{{ url('event/'.$top->slug)}}" class="link-title"><b>{{ $top->judul}}</b></a></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <div class="row">
                  <div class="long-iklan">
                        <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
                        <!-- home -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8112897684014622"
                             data-ad-slot="8480814423"
                             data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br/>
    <div style="clear:both;"></div>
    <!-- Event -->
    <section class="home-articles">
        <div class="container">
          <div class="row">
            <div class="frame-judul">
              <b class="tab-judul">Event Kemarin</b>
            </div>
          </div>
          <br/>
          <div class="row">

              <div class="col-md-6">

              </div>
              <div class="col-md-6">
                <div class="col-md-6 artikel-cari">
                    <form method="GET" action="event">

                        <input type="text" name="cari" class="input-cari form-control" placeholder="Search ..." value="{{ isset($cari) ? $cari : ''}}">
                        <button class="btn-cari"><i class="glyphicon glyphicon-search"></i></button>

                    </form>
                 </div>
                 <div class="col-md-6">
                   <div class="tombol-next">
                          <a href="/event" class="btn btn-default btn-next">Lihat Event Lainnya <i class="glyphicon glyphicon-arrow-right"></i></a>
                        </div>
                 </div>
               </div>
             </div>
             <br/>
              <div class="row">
                @if(count($event_kemarin) === 0)
                    <h2 align="center">Maaf saat ini Event tidak ada!</h2>
                        <h3 align="center">Baca <a href="/article">artikel</a> ajah yukk</h3>
                        <br/>
                        <br/>
                @else
                @foreach($event_kemarin as $events)
                  <div class="col-md-3">
                    <div class="post-item">
                      <div class="tumb-event">
                        <a href="event/{{ $events->slug }}"><img data-original="storage/{{ $events->poster }}" class="tumb-img-event"></a>
                      </div>
                      <div class="post-body">
                        <div class="post-category">
                          <?php
                            $id = $events->event_category_id;
                            $kat = App\EventCategory::where('id','=',$id)->first();
                          ?>
                          <a href="/category-event/{{ $kat->slug }}">{{ $kat->nama }}</a>
                        </div>
                        <h3 class="post-title">
                          <a href="/event/{{ $events->slug }}" class="link-title">{{ $events->judul }}</a>
                        </h3>
                        <div class="post-info">
                          <p class="margin-xs-bottom">
                            <span class="post-time-upcoming">
                              <span class="fa fa-calendar fa-fw"></span>
                              {{ date("F j, Y ", strtotime($events->tanggalPelaksanaan)) }}
                            </span>
                          </p>
                          <p>
                            <span class="fa fa-map-marker fa-fw"></span>
                            {{ $events->kota }}
                          </p>

                        </div>
                        <div class="post-button">
                            <a href="/event/{{ $events->slug }}" class="btn btn-default btn-next">Lihat Detail</a>
                        </div>
                      </div>
                    </div>
                  </div>

                @endforeach
                @endif

                    <br/>
                    </div>
                    <div class="row text-center">
                    {{ $event_kemarin->links() }}
                  </div>
          </div>
        </div>
    </section>
      <hr/>
      <div class="container">
        <div class="row">
          <div class="long-iklan">
              <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
            <!-- home -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8112897684014622"
                 data-ad-slot="8480814423"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
          </div>
        </div>
      </div>

      <hr/>

        {{-- <section id="services" class="services content-section" style="color: #42c5f4;">
              <br/>

              <div class="container">
                  <div class="row text-center">
                      <div class="col-md-12">
                        <h2 class="text-center putih">Paket Media Partner Event Sekolah di Indonesia</h2>
                        <p class="text-center putih">PROMO! Semua Paket GRATIS !</p>
                        <br>
                      </div><!-- /.col-md-12 -->

                      <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="paket services-item sans-shadow">
                                  <h3 class="text-center padding16" style="margin:0;">Basic</h3>
                                  <hr>
                                  <div class="">
                                    <h4>Fasilitas</h4>
                                    <ul class="ul-paket">
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> Post event di website</p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> 1x Post di IG exschool_com</p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> 1x Post TimeLine</p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> 1x Post Fanspage Facebook</p></li>
                                    </ul>
                                    <hr>
                                    <h4>*Syarat dan Ketentuan</h4>
                                    <ul  class="ul-paket-hide">
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> 5 user follow IG <i>@exschool_com</i></p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> Share 10x event(<i>pihak bersangkutan</i>) yang ada di Timeline kami</p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> Menyertakan logo EX-SCHOOL di seluruh media yang digunakan untuk promosi, seperti : Poster, Spanduk, Tiket, dll.</p></li>
                                    </ul>
                                    <p><a class="btnDown">Lihat Selengkapnya disini ...</a> </p>
                                    <p><a class="btnUp">Lihat Lebih Sedikit ...</a> </p>

                                    <br/>
                                    <div class="text-center" style="margin-top: 8px;margin-bottom:32px;">
                                      <a href="http://line.me/ti/p/%40djp1712p" class="btnTokopedia text-center">Chat Via Line</a>
                                    </div>
                                  </div>
                                </div>
                            </div><!-- /.col-md-4 -->

                            <div class="col-md-4">
                                <div class="paket services-item sans-shadow">
                                  <h3 class="text-center padding16" style="margin:0;">SILVER</h3>

                                  <hr>
                                  <div class="">
                                    <h4>Fasilitas</h4>
                                    <ul  class="ul-paket">
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> Post event di website</p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> 3x Post di IG @exschool_com</p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> 3x Post TimeLine</p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> 3x Post Fanspage Facebook</p></li>
                                    </ul>
                                    <hr>
                                    <h4>*Syarat dan Ketentuan</h4>
                                      <ul  class="ul-paket-hide">
                                        <li><p><i class="fa fa-check" aria-hidden="true"></i> 10 user follow IG <i>@exschool_com</i></p></li>
                                        <li><p><i class="fa fa-check" aria-hidden="true"></i> Share 20x event(<i>pihak bersangkutan</i>) yang ada di Timeline kami</p></li>
                                        <li><p><i class="fa fa-check" aria-hidden="true"></i> Menyertakan logo EX-SCHOOL di seluruh media yang digunakan untuk promosi, seperti : Poster, Spanduk, Tiket, dll.</p></li>
                                      </ul>
                                    <p><a class="btnDown">Lihat Selengkapnya disini ...</a> </p>
                                    <p><a class="btnUp">Lihat Lebih Sedikit ...</a> </p>

                                    {{-- <h4>* Tidak ada Syarat dan Ketentuan</h4>
                                    <p>Cek Harga langsung klik tombol dibawah</p> --}}
                                    {{-- <br/>
                                    <div class="text-center" style="margin-top: 8px;margin-bottom:32px;">
                                      <a href="http://line.me/ti/p/%40djp1712p"class="btnTokopedia text-center" > Chat Via Line</a>
                                    </div>
                                  </div>
                                </div>
                            </div><!-- /.col-md-4 -->

                            <div class="col-md-4">
                                <div class="paket services-item-fixed sans-shadow">
                                  <h3 class="text-center padding16" style="margin:0;">GOLD</h3>

                                  <hr>
                                  <div class="">
                                    <h4>Fasilitas</h4>
                                    <ul  class="ul-paket">
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> Post event di website (Fitur Utama)</p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> 6x Post di IG exschool_com</p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> 6x Post Line</p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> 6x Post Fanspage Facebook</p></li>
                                      <li><p><i class="fa fa-check" aria-hidden="true"></i> 6x Post Twitter</p></li>
                                    </ul>
                                    <hr>
                                    <h4>*Syarat dan Ketentuan</h4>
                                      <ul  class="ul-paket-hide">
                                        <li><p><i class="fa fa-check" aria-hidden="true"></i> 20 user follow IG <i>@exschool_com</i></p></li>
                                        <li><p><i class="fa fa-check" aria-hidden="true"></i> Share 30x event(<i>pihak bersangkutan</i>) yang ada di Timeline kami</p></li>
                                        <li><p><i class="fa fa-check" aria-hidden="true"></i> Menyertakan logo EX-SCHOOL di seluruh media yang digunakan untuk promosi, seperti : Poster, Spanduk, Tiket, dll.</p></li>
                                      </ul>
                                    <p><a class="btnDown">Lihat Selengkapnya disini ...</a> </p>
                                    <p><a class="btnUp">Lihat Lebih Sedikit ...</a> </p>

                                    {{-- <h4>* Tidak ada Syarat dan Ketentuan</h4>
                                    <p>Cek Harga langsung klik tombol dibawah</p> --}}
                                    {{-- <br/>
                                    <div class="text-center" style="margin-top: 8px;margin-bottom:32px;">
                                      <a href="http://line.me/ti/p/%40djp1712p" class="btnTokopedia text-center">Chat Via Line</a>
                                    </div>
                                  </div>
                                </div>
                            </div><!-- /.col-md-4 -->

                        </div><!-- /.row -->
                      </div><!-- /.container -->

                  </div><!-- /.row -->
              </div><!-- /.container -->
              <br/>
              <br/>
              <br/>

        </section> --}}


          <section style="border-top: 1px solid #DCDCDC; background: #42c5f4; padding: 64px;">
            <div class="container">
              <div class="col-md-8">
                <p style="color: #fff; font-size: 18px;">Bingung! Mau Promosi Event kamu sedetail mungkin ??<br/>
                EX - School menyediakan fasilitasnya, Langsung aja Klik tombol disamping.</p>
              </div>
              <div class="col-md-4">
                <div>
                  <a href="dashboard/event" class="btn btn-event " style="border:1px solid #fff;"><i class="fa fa-pencil-square margin-xs-right"></i> Buat Event Sekarang!</a>
                </div>
              </div>
            </div>

          </section>
        <br>
      <div class="container">
      <div class="row">
        <div class="col-md-8">
          <!--- Judul ARTIKEL TERBARU -->
            <div class="row">
              <div class="frame-judul">
                <b class="tab-judul">ARTIKEL TERBARU</b>
              </div>
            </div>
          <!--End -->

          <!--- ARTIKEL TERBARU -->
          @foreach ($toppost as $top)
            <div class="row">
              <div class="news-frame">
                <div class="col-md-6">
                  <div class="news-image">
                    <a href="artikel/{{$top->slug}}">
                      <img data-original="storage/{{ $top->image}}" alt="" class="img-responsive">
                    </a>
                    <?php
                      $id = $top->category_id;
                      $cat = App\Category::where('id','=', $id)->first();
                    ?>
                      <a href="category/{{ $cat->slug }}" class="one-category">{{ $cat->name }}</a>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="news-decs">
                    <a href="artikel/{{ $top->slug }}" class="link-title"><h4>{{ $top->title }}</h4> </a>
                    <p>{!! substr($top->meta_description, 0,100)!!} ...</p>
                    <h5 style="text-align:center;"><a href="/artikel/{{$top->slug}}" >Lihat Selengkapnya</a> </h5>
                  </div>
                </div>

              </div>
            </div>
          @endforeach

          <!-- END ARTIKEL TERBARU -->
          <br/>
          <br/>
          <!-- Artikel Titile -->
            <div class="row">
              <div class="col-md-6">
                <!--- Judul ARTIKEL TRENDING -->
                  <div class="">
                    <div class="frame-judul">
                      <b class="tab-judul">ARTIKEL TRENDING</b>
                    </div>
                    <div class="frame-title">
                      <ul>
                        @foreach ($postPilihan as $p)

                            <li><b><a href="artikel/{{$p->slug}}" class="link-title">{{ $p->title }}</a></b></li>
                            <div class="font-12 font-abu top16">
                              {!! substr($p->body, 0,100)!!}<span>...</span>
                              <a href="artikel/{{$p->slug}}" class="link-url">Baca Selangkapnya</a>
                            </div>
                            <?php
                            $id = $p->author_id;
                            $user = App\User::where('id','=', $id)->first();
                            ?>
                            <span>
                              <b><a href="author/{{$user->id}}">{{$user->name}}</a> </b> -
                              <i>{{ date('j F Y', strtotime($p->created_at)) }}</i>
                            </span>
                            <hr/>
                        @endforeach
                      </ul>
                    </div>
                    <div class="text-center">
                      <a href="article/">Lihat Lainnya</a>
                    </div>
                    <br/>
                  </div>
                <!--End -->
              </div>
              <div class="col-md-6">
                <!--- Judul ARTIKEL TIPS -->
                  <div class="">
                    <div class="frame-judul">
                      <b class="tab-judul">TIPS & TRIK</b>
                    </div>
                    <div class="frame-title">
                      <ul>
                        @foreach ($tips as $p)

                            <li><b><a href="artikel/{{$p->slug}}" class="link-title">{{ $p->title }}</a></b></li>
                            <div class="font-12 font-abu top16">
                              {!! substr($p->body, 0,100)!!}<span>...</span>
                              <a href="artikel/{{$p->slug}}" class="link-url">Baca Selangkapnya</a>
                            </div>
                            <?php
                            $id = $p->author_id;
                            $user = App\User::where('id','=', $id)->first();
                            ?>
                            <span>
                              <b><a href="author/{{$user->id}}">{{$user->name}}</a> </b> -
                              <i>{{ date('j F Y', strtotime($p->created_at)) }}</i>
                            </span>
                            <hr/>
                        @endforeach
                      </ul>
                    </div>
                    <div class="text-center">
                      <?php
                        $id_cat = $p->category_id;
                        $cat = App\Category::find($id_cat);

                      ?>
                      <a href="category/{{$cat->slug}}">Lihat Lainnya</a>
                    </div>
                    <br/>
                  </div>
                <!--End -->
              </div>
            </div>
          <!--- END-->
        </div>
        <div class="col-md-4">
          <div class="widget" style="margin-top:0;">
            <div class="frame-judul">
              <b class="tab-judul">KATEGORI EVENT</b>
            </div>
            <div class="frame-title">
              <?php
                $category = app\EventCategory::all();
              ?>
              <ul>
                @foreach ($category as $kat)
                  <li><a href="category-event/{{ $kat->slug }}">{{ $kat->nama }}</a> </li>
                  <hr style="margin:8px;"/>
                @endforeach
              </ul>
            </div>
            <div class="iklan-kotak">
                <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
                <!-- kotak 300x250 -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:300px;height:250px"
                     data-ad-client="ca-pub-8112897684014622"
                     data-ad-slot="5631607030"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>

            </div>
            <br/>
            <!-- <div class="img-widget">
              <div class="frame-judul">
                <b class="tab-judul">FOLLOW INSTAGRAM</b>
              </div>
              <br/>
              <div class="instagram">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/BnOS-nZjAX3/?utm_source=ig_embed" data-instgrm-version="9" style=" height:500px; background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px; "> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/BnOS-nZjAX3/?utm_source=ig_embed" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by EX SCHOOL 🇮🇩 (@exschool_com)</a> on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2018-09-02T12:15:49+00:00">Sep 2, 2018 at 5:15am PDT</time></p></div></blockquote> <script async defer src="//www.instagram.com/embed.js"></script>
              </div>
            </div> -->
            </div>
        </div>
      </div>
    </div>
<!-- <hr> -->

  <!-- <div class="container text-center">
    <h2>Official Partner</h2>
    <a href="https://www.instagram.com/pembaris.jawabarat/"><img data-original="gambar/pejabat.png" alt="" align="center" width="200"></a>
  </div> -->
<!-- <hr> -->
<br>
<br>


@endsection
@section('js')

  <script>
    $(document).ready(function(){
      $(".btnDown").click(function(){
        $(".ul-paket-hide").slideDown();
        $(".btnDown").hide();
        $(".btnUp").show();
      });
      $(".btnUp").click(function(){
        $(".ul-paket-hide").slideUp();
        $(".btnDown").show();
        $(".btnUp").hide();
      });
    });
  </script>
@endsection
