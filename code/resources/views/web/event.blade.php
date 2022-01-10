@extends('master')

@section('title','EX - School')
@section('js')
<script src="//platform-api.sharethis.com/js/sharethis.js#property=5b140535093c0e0011b037b4&product=sticky-share-buttons"></script>
@endsection
@section('content')
<div style="clear: both; padding-top: 32px;"></div>
  <div class="container top64">
    <div class="row">
        <div class="lert alert-warning">
          @if($message = Session::get('berhasil'))
                            <div class="alert alert-success">
                              <p>
                                {{ $message }}
                              </p>
                            </div>
                            @endif
                            @if($message = Session::get('gagal'))
                              <div class="alert alert-warning">
                                <p>
                                  {{ $message }}
                                </p>
                              </div>
                            @endif
        </div>
    </div>
    <div class="col-md-8">
      <div class="content-container">
            <article class="hal">
                <div class="kat">
                  <ol class="breadcrumb">
                    <li class="link"><a href="{{ url('event') }}">Event</a></li>
                    <li class="link"><a href="{{ url('category-event/'.$category->slug) }}">{{ $category->nama }}</a></li>
                    <li class="active">{{ $event->judul }}</li>
                  </ol>
                </div>
              <div class="content-author">
                <div class="media">
                          <div class="media-kiri">
                            <div class="content-avatar">
                              <img src="{{ url('storage/'.$author->avatar)}}" class="">
                            </div>
                          </div>
                          <div class="media-body">
                            <div class="content-name"><a href="{{ url('dashboard/profile') }}" class="link">{{ $author->name }}</a></div>
                          <div class="content-position"></div>
                            <div class="content-date"><i>{{ date('j F Y', strtotime($event->created_at)) }}</i></div>
                          </div>
                </div>
              </div>
              <h2>{{ $event->judul }}</h2>
              <h4 class="title-segment"><span class="fa fa-fw fa-file-image-o"></span> Poster</h4>
              <p><img src="../storage/{{ $event->poster }}" class="full-width img-responsive"></p>
              <br/>
              <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:250px"
                 data-ad-client="ca-pub-8112897684014622"
                 data-ad-slot="5631607030"></ins>
              <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
                <br>
              <div class="content-body">
                {{-- <h5 class="title-segment"><span class="fa fa-fw fa-info-circle"></span> HTM</h5>
                <p><b>{{ $event->status }}</b> </p>
                <br> --}}


                <h5 class="title-segment"><span class="fa fa-fw fa-calendar"></span> Waktu Pelaksanaan</h5>
                <p>
                Tanggal : <b> {{ date('j F Y', strtotime($event->tanggalPelaksanaan )) }} s/d {{ date('j F Y', strtotime($event->tanggalBerakhir )) }}</b>
                {{-- <br/>
                Jam : <b> {{ $event->waktuPelaksanaan}} </b> --}}
                </p>
                {{-- <br>
                <h5 class="title-segment"><span class="fa fa-fw fa-map-marker"></span> Lokasi</h5>
                <p><b> {{ $event->lokasi }} </b>
                <br> --}}
                <br>
                <h5 class="title-segment"><span class="fa fa-fw fa-info"></span> Deskripsi</h5>
                <p> {!! $event->deskripsi !!} </p>


                <br/>
              </div>
              <br>
              {{-- <a href="https://goo.gl/forms/LewHNKVZMl8KtJvJ2" target="_blank"><img src="../gambar/iklan ulas.jpg" alt="Iklan Ulas Organisasi" class="img-responsive"></a>
              <br> --}}
              <ins class="adsbygoogle"
                   style="display:block"
                   data-ad-client="ca-pub-8112897684014622"
                   data-ad-slot="4803850606"
                   data-ad-format="auto"
                   data-full-width-responsive="true"></ins>
              <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
              <br>
            </div>
            <h3>Share Event</h3>
              <div class="social-buttons">

                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"
                    target="_blank" class="btn btn-primary" style="padding-right: 32px; padding-left: 32px; font-size: 18px;"><i class="fa fa-facebook-official"></i>

                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}"
                    target="_blank" class="btn btn-twiter" style="padding-right: 32px; padding-left: 32px; font-size: 18px;"><i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}"
                    target="_blank" class="btn btn-danger" style="padding-right: 32px; padding-left: 32px; font-size: 18px;"><i class="fa fa-google-plus-official" aria-hidden="true"></i>
                </a>
                <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }}"data-action="share/whatsapp/share"
                    target="_blank" class="btn" style="background: #0cc30c; color:#fff; padding-right: 32px; padding-left: 32px; font-size: 18px;"><i class="fa fa-whatsapp" aria-hidden="true"></i>
                </a>
              </div>
            </article>
            <div class="row top64">
              @foreach($eventTerbaru as $event)
                <div class="col-md-4">
                  <div class="post-item">
                    <div class="tumb-event">
                      <a href="/event/{{ $event->slug }}"><img src="/storage/{{ $event->poster }}" class="tumb-img-event"></a>
                    </div>
                    <div class="post-body">
                      <div class="post-category">
                        <a href="#">EVENT</a>
                      </div>
                      <h3 class="post-title">
                        <a href="/event/{{ $event->slug }}" class="link-title">{{ $event->judul }}</a>
                      </h3>
                      <div class="post-info">
                        <p class="margin-xs-bottom">
                          <span class="post-time-upcoming">
                            <span class="fa fa-calendar fa-fw"></span>
                            {{ date("F j, Y ", strtotime($event->tanggalPelaksanaan)) }}
                          </span>
                        </p>
                        <p>
                          <span class="fa fa-map-marker fa-fw"></span>
                          {{ $event->kota }}
                        </p>

                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            <div class="row">
      				<div class="long-iklan">
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
      			<br>
            <br/>
        </div>

      <div class="col-md-4">
        <div class="row">
          <div class="img-widget">
            <div class="iklan-kotak">
              <!-- kotak 300x250 -->
              <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:250px"
                 data-ad-client="ca-pub-8112897684014622"
                 data-ad-slot="5631607030"></ins>
              <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
              </script>

            </div>
          </div>
          <br>
          <div class="img-widget">
            <div class="frame-judul">
              <b class="tab-judul">EVENT TERKEREN</b>
            </div>
            <br>
            @foreach ($eventUtama as $baru)
              <div class="one-image" style="background-image:url('../storage/{{ $baru->poster}}')">
                <?php
                  $id = $baru->event_category_id;
                  $category = App\EventCategory::find($id);
                ?>
                <div class="one-category">
                  <b>{{ $category->nama }}</b>
                </div>
                <a href="{{ url('event/'.$baru->slug) }}" class="one-link">
                  <div class="one-title">
                    <h4>{{ $baru->judul }}</h4>
                  </div>
                </a>
              </div>
              <br>
            @endforeach

          </div>
          <div class="img-widget">
            <div class="frame-judul">
              <b class="tab-judul">ARTIKEL TRENDING</b>
            </div>
            <br>
            @foreach ($postTerbaru as $baru)
              <div class="one-image" style="background-image:url('../storage/{{ $baru->image}}')">
                <?php
                  $id = $baru->category_id;
                  $category = App\Category::find($id);
                ?>
                <div class="one-category">
                  <b>{{ $category->name }}</b>
                </div>
                <a href="{{ url('artikel/'.$baru->slug) }}" class="one-link">
                  <div class="one-title">
                    <h4>{{ $baru->title }}</h4>
                  </div>
                </a>
              </div>
              <br>
            @endforeach

          </div>

          <div class="img-widget">
            <div class="iklan-kotak">
              <!-- kotak 300x250 -->
              <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:250px"
                 data-ad-client="ca-pub-8112897684014622"
                 data-ad-slot="5631607030"></ins>
              <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
              </script>

            </div>
          </div>
          <!-- <div class="img-widget">
            <h4>Ikuti Fanspage Kami</h4>
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.0&appId=142712169924381&autoLogAppEvents=1';
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
              <div class="fb-page" data-href="https://www.facebook.com/OfficialEXSchool/" data-tabs="timeline" data-width="300" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/OfficialEXSchool/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/OfficialEXSchool/">EX - School</a></blockquote></div>
          </div> -->
          <br/>
          <div class="img-widget">
            <div class="frame-judul">
              <b class="tab-judul">FOLLOW INSTAGRAM</b>
            </div>
            <br/>
            <div class="instagram">
              <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/BnOS-nZjAX3/?utm_source=ig_embed" data-instgrm-version="9" style=" height:500px; background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px; "> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/BnOS-nZjAX3/?utm_source=ig_embed" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by EX SCHOOL 🇮🇩 (@exschool_com)</a> on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2018-09-02T12:15:49+00:00">Sep 2, 2018 at 5:15am PDT</time></p></div></blockquote> <script async defer src="//www.instagram.com/embed.js"></script>
            </div>
            <!-- InstaWidget -->

          </div>
          <hr/>
          <br/>
          <div class="img-widget">
            <h4 class="judul-widget">Other Event</h4>
              @foreach($events as $po)
              <a href="{{ url('event/'.$po->slug) }}" class="link">{{ $po->judul }}</a>
              <div style="border: 1px dashed #d9d9d9; margin-top: 8px; margin-bottom: 8px;"></div>
              @endforeach
          </div>
          <div class="img-widget">
            <div class="instagram">
              <a href="https://panel.niagahoster.co.id/ref/158789" target="_blank"><img src="https://panel.niagahoster.co.id/banners/Set4-niagahoster-300x250.png" alt="Hosting Unlimited Indonesia" border="0" width="300" height="250" /></a>
            </div>
          </div>


        </div>
      </div>
    </div>

    </div>

@endsection
@section('js')
<script>

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>
@endsection
