@extends('master')
@section('title')
  View Video - {{$video->judul}}
@endsection

@section('content')

  <div class="container top64">
  <div class="left col-md-8">
    <div class="video_container">
      <div class="videoWrapper">
        @if(!Auth::user())
          <div class="larangan" >
            <h2>Maaf anda harus <a href="/login">LOGIN</a> untuk menonton videonya</h2>
            <img src="/gambar/stop.png" alt="Perintah Login" class="img-responsive">
            <br>
            <br>
          </div>
        @elseif (Auth::user())
        {!! $video->video !!}
        @endif
      </div>
    </div>
    <div style="clear:both;"></div>
      <div class="deskripsi-video">
        <h3><a href="/video/{{$video->slug}}">{{ $video->judul}}</a></h3>
          <div style="border:1px solid #d9d9d9; margin-bottom:16px; margin-top:16px;"></div>
            {!! $video->deskripsi !!}
      </div>
    <div class="top45 lanjut">
      <h3 class="judul">Video Lainnya</h3>
            <?php $lanjut = App\Video::paginate(3);?>
            @foreach ($lanjut as $l)
          <div class="col-md-4">
              <a href="/video/{{$l->slug}}">
                <div><img src="/storage/{{$l->gambar}}" alt=""></div>
                  <p class="text-center">{{ $l->judul}}</p>
              </a>

          </div>
        @endforeach
        <div style="clear:both;"></div>
    </div>
    <div class="row top64">
          <div id="disqus_thread"></div>
            <script>

            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
     
            var disqus_config = function () {
            this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = {{ $video->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
         
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://ex-school.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
        <br/>
    </div>
    <div class="left col-md-4">
        <div class="widget">
      <div class="img-widget">
          <h4>Halaman Pilihan</h4>
          <!-- <a href="/forums">
                <div class="bg-widget">
                  <img src="/gambar/forum.png" alt="" class="img-responsive">
                </div>
              </a> -->
              <a href="/video">
                <div class="bg-widget1">
                  <img src="/gambar/video.png" alt="" class="img-responsive">
                </div>
              </a>
              <a href="/article">
                <div class="bg-widget2">
                  <img src="/gambar/artikel.png" alt="" class="img-responsive">
                </div>
              </a>
              <a href="/event">
                <div class="bg-widget3">
                  <img src="/gambar/mading.png" alt="" class="img-responsive">
                </div>
              </a>

      </div>
      <div class="text-widget">
          <h4 style="text-align:left;">VIDEO TERBARU</h4>
          <br>
          <?php $post = App\Video::all(); ?>
          @foreach($post as $videos)
              <a href="/random/{{$videos->slug}}" class="link"> {{ $videos->judul }}</a>
              <div style="border:1px solid #f1f1f1; margin-top: 8px; margin-bottom: 8px;"></div>
          @endforeach
      </div>
      </div>

      </div>
    </div>

    </div>
    
    

@endsection
