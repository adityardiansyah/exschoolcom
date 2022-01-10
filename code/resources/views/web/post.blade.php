@extends('master')
@section('title')
{{ $post->seo_title }} | Artikel
@endsection
@section('css')
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
  <style media="screen">
    @media screen and (max-width:375px){
      .tops{
        margin-top:84px;
      }
      .top-iklan{
        display: none;
      }
    }
  </style>
  <script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-8112897684014622",
          enable_page_level_ads: true
     });
   </script>
@endsection

@section('content')
  {{-- <div id="fb-root"></div> --}}
  {{-- <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.0&appId=142712169924381&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script> --}}


  <div style="clear: both; padding-top: 32px;"></div>
  <div class="container top64">
    <div class="tops"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="long-iklan top-iklan">
          <!-- Iklan Text Respon 1 -->
          <ins class="adsbygoogle"
               style="display:block"
               data-ad-client="ca-pub-8112897684014622"
               data-ad-slot="4803850606"
               data-ad-format="auto"
               data-full-width-responsive="true"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <br>
      <article class="hal">
                <div class="kat">
                  <ol class="breadcrumb">
                    <li class="link"><a href="{{ url('article') }}">Artikel</a></li>
                    <li class="link"><a href="{{ url('category/'.$category->slug) }}">{{ $category->name }}</a></li>
                    <li class="active">{{ $post->title }}</li>
                  </ol>
                </div>
              <div class="content-author">
                <div class="media">
                  <div class="media-kiri">
                    <div class="content-avatar">
                      <img data-original="../storage/{{$author->avatar}}" class="lazy">
                    </div>
                  </div>
                  <div class="media-body">
                    <div class="content-name">
                        <a href="#" class="link">{{ $author->name }}</a>
                      <div class="content-position"></div>
                      <div class="media-user">
                          <i class="f12">Posting at {{ date('j F Y', strtotime($post->created_at)) }}</i><br/>
                          <i class="f12">Dilihat {{ $post->view }} pemirsa</i>
                      </div>
                    </div>

                </div>
              </div>

                <div class="title-post">
                    <h2>{{ $post->title }}</h2>
                </div>
                <br>
                <div class="long-iklan">
                  <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
                  <!-- home -->
                  <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-8112897684014622"
                     data-full-width-responsive="true"
                     data-ad-slot="8480814423"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                  <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
                </div>
              </div>

        <img data-original="../storage/{{ $post->image}}" alt="{{ $post->title }}" class="img-responsive full-width lazy" style="margin:auto;">

        <div class="content-body">
          <p>{!! $post->body!!}</p>
          <br>
          <div class="long-iklan">
            <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
            <!-- home -->
            <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-8112897684014622"
             data-full-width-responsive="true"
             data-ad-slot="8480814423"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
            <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
          </div>
          <br>

          @if($category->slug == 'tni-polri')
            <!-- <h4>JANGAN KUATIR !</h4>
            Kami membantu anda dalam menuju kesuksesan anda. Jika kamu masih kurang puas dengan artikel kami,
            kamu bisa order buku SUPER AJAIB yang bisa membantu kamu dalam belajar sebelum Tes TNI / POLRI.
            Langsung saja <b>KLIK GAMBAR</b> dibawah ini !
            <a href="https://www.bukalapak.com/p/hobi-koleksi/buku/pengembangan-diri/1tgp857-jual-buku-diktat-resmi-sukses-seleksi-tni-polri" target="_blank"><img src="{{ asset('gambar/product/diktat.jpeg')}}" class="lazy img-responsive" alt="Beli Buku DIKTAT" style="cursor:pointer;"></a> -->
          @endif

        <h3>Artikel Terkait</h3>
        <div class="row">
          @foreach ($postTerkait as $terkait)
            <ul>
              <b><li><a href="{{ $terkait->slug }}">{{ $terkait->title }}</a></li></b>
            </ul>
          @endforeach
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-format="autorelaxed"
                 data-ad-client="ca-pub-8112897684014622"
                 data-ad-slot="9467913529"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
          </div>
        </div>
        {{-- <h3>Share Artikel</h3>
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
        </div> --}}
      </div>
      </article>
      <div class="row top64">
              @foreach($postTerbaru as $event)
                <div class="col-md-4">
                  <div class="post-item">
                    <div class="post-thumb">
                      <a href="{{ url('artikel/'.$event->slug) }}"><img data-original="../storage/{{ $event->image }}" class="img-responsive lazy"></a>
                    </div>
                    <div class="post-body">
                      <div class="post-category">
                        <a href="{{ url('category/'.$category->slug) }}">{{ $category->name }}</a>
                      </div>
                      <h3 class="post-title">
                        <a href="{{ url('artikel/'.$event->slug) }}" class="link-title">{{ $event->title }}</a>
                      </h3>
                      <?php
                        $id = $event->author_id;
                        $user = App\User::where('id','=', $id)->first();
                      ?>
                      <!--<div class="link-author"><a href="/author/{{ $user->id }}">{{ $user->name }}   </a><img src="../gambar/logokecil.png" width="25px" height="25px"></div>-->
                    </div>
                  </div>
                </div>
              @endforeach
        </div>
        <!--<div class="row">-->
        <!--  <div class="long-iklan">-->
        <!--        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
                <!-- home -->
        <!--        <ins class="adsbygoogle"-->
        <!--             style="display:block"-->
        <!--             data-ad-client="ca-pub-8112897684014622"-->
        <!--             data-ad-slot="8480814423"-->
        <!--             data-ad-format="auto"></ins>-->
        <!--        <script>-->
        <!--        (adsbygoogle = window.adsbygoogle || []).push({});-->
        <!--        </script>-->
        <!--  </div>-->
        <!--</div>-->
        <br>
        <!--<div class="row top64 padding16">-->
        <!--  <div class="fb-comments" data-href="" data-numposts="5" data-width="100%" data-mobile=""></div>-->
        <!--</div>-->
        <br/>

      </div>
      <div class="col-md-4">

        <div class="row">
        <div class="widget">
          {{-- <div class="img-widget">
              <a href="/dashboard/event"><img src="../gambar/iklan event.jpg" alt="" class="img-responsive lazy"></a>
          </div> --}}
          <!-- <br> -->
          <!-- <div class="img-widget">
            <div class="iklan-kotak"> -->
              <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
              <!-- kotak 300x250 -->
              <!-- <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:250px"
                 data-ad-client="ca-pub-8112897684014622"
                 data-ad-slot="5631607030"></ins>
              <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
              </script>

            </div>
          </div> -->
          <br>
          <div class="img-widget">
            <div class="frame-judul">
              <b class="tab-judul">ARTIKEL TRENDING</b>
            </div>
            <br>
            @foreach ($postTerbaru as $baru)
              <div class="one-image" style="background-image:url('../storage/{{ $baru->image}}')" class="lazy">
                <?php
                  $id = $baru->category_id;
                  $category = App\Category::find($id);
                ?>
                <div class="one-category">
                  <b>{{ $category->name }}</b>
                </div>
                <a href="{{ $baru->slug }}" class="one-link">
                  <div class="one-title">
                    <h4>{{ $baru->title }}</h4>
                  </div>
                </a>
              </div>
              <br>
            @endforeach

          </div>

          <br>
          <!--<div class="img-widget">-->
          <!--  <div class="frame-judul">-->
          <!--    <b class="tab-judul">IKUTI FANSPAGE KAMI</b>-->
          <!--  </div>-->
          <!--  <br/>-->
          <!--  <div class="instagram">-->
          <!--    <div id="fb-root"></div>-->
          <!--    <script>(function(d, s, id) {-->
          <!--      var js, fjs = d.getElementsByTagName(s)[0];-->
          <!--      if (d.getElementById(id)) return;-->
          <!--      js = d.createElement(s); js.id = id;-->
          <!--      js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.0&appId=142712169924381&autoLogAppEvents=1';-->
          <!--      fjs.parentNode.insertBefore(js, fjs);-->
          <!--    }(document, 'script', 'facebook-jssdk'));</script>-->
          <!--    <div class="fb-page" data-href="https://www.facebook.com/exschoolcom/" data-tabs="timeline" data-width="300" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/OfficialEXSchool/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/OfficialEXSchool/">EX - School</a></blockquote></div>-->
          <!--  </div>-->
          <!--</div>-->
          <br/>
          <hr/>

          <div class="img-widget">
            <h4 class="judul-widget">Recommended Artikel</h4>
              @foreach($posts as $po)
              <a href="{{ url('artikel/'.$po->slug) }} " class="link">{{ $po->title }}</a>
              <div style="border: 1px dashed #d9d9d9; margin-top: 8px; margin-bottom: 8px;"></div>
              @endforeach
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
          <!-- <div class="img-widget">
            <div class="instagram">
              <a href="https://www.bukalapak.com/p/hobi-koleksi/buku/pengembangan-diri/1d2wu7v-jual-super-buku-psikotes-diktat-drilling-top-no-1-psikotes-gambar" target="_blank"><img data-original="{{ asset('gambar/product/PSIKOTES_GAMBAR.jpg') }}" style="box-shadow:0px 1px 8px #000; " alt=""></a>
            </div>
          </div> -->
          <div class="img-widget" >
            <div class="iklan-kotak" style="position: -webkit-sticky; position: sticky; top: 0;">
              <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
              <!-- kotak 300x250 -->
              <ins class="adsbygoogle"
                   style="display:block"
                   data-ad-client="ca-pub-8112897684014622"
                   data-ad-slot="8480814423"
                   data-ad-format="auto"
                   data-full-width-responsive="true"></ins>
              <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
              </script>

            </div>
          </div>
        </div>
        <br/>
        <br/>
                  <!--<div class="img-produk">-->
        <!--  <a href="https://tokopedia.link/sCoc/okxId9RsFJ" target="_blank"><img src="/gambar/baju-exschool.png" class="img-responsive"></a>-->
        <!--</div>-->
      </div>
    </div>
  </div>
  <div class="modal" id="popup" style="padding:0;width:100%;overflow:none!important; z-index:999999!important;">
    <a href="http://bit.ly/2VdMi1f" target="_blank">
      <img data-original="{{ asset('gambar/popup_utama.png') }}" class="img-responsive" alt="">
    </a>
  </div>
@endsection
@section('js')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->
    <script>
    // var id = true;
    // $(window).scroll(function () {
    //     if ($(this).scrollTop() > 3000) {
    //       if (id) {
    //         $('#popup').modal({
    //           fadeDuration: 600,
    //           fadeDelay: 1
    //         });
    //         id = false;
    //       }
    //     } else {
    //       $('#popup').hide();
    //     }
    // });
    //
    //
    // var popupSize = {
    //     width: 780,
    //     height: 550
    // };
    </script>
    {{-- <script src="//platform-api.sharethis.com/js/sharethis.js#property=5b140535093c0e0011b037b4&product=sticky-share-buttons"></script> --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.lazyload.js') }}"></script>
<script>


    // $(document).on('click', '.social-buttons > a', function(e){
    //
    //     var
    //         verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
    //         horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);
    //
    //     var popup = window.open($(this).prop('href'), 'social',
    //         'width='+popupSize.width+',height='+popupSize.height+
    //         ',left='+verticalPos+',top='+horisontalPos+
    //         ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');
    //
    //     if (popup) {
    //         popup.focus();
    //         e.preventDefault();
    //     }
    //
    // });
    $("img").lazyload({
        effect : "fadeIn"
    });
    // Lazy Load AdSense
    var lazyadsense=!1;window.addEventListener("scroll",function(){(0!=document.documentElement.scrollTop&&!1===lazyadsense||0!=document.body.scrollTop&&!1===lazyadsense)&&(!function(){var e=document.createElement("script");e.type="text/javascript",e.async=!0,e.src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js";var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(e,a)}(),lazyadsense=!0)},!0);
</script>

@endsection
