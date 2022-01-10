@extends('master')

@section('title', 'EX - School')

@section('content')
  <section class="cp-jumbotron" style="background: url(gambar/article.jpg)center center; background-attachment: fixed;">
  <div class="container text-center text-header">

        <h1 style="font-family: gotham-rounded;">BERBAGI PENGETAHUAN</h1>
        <p>Saling berbagi pengetahuan dan pengalaman dalam Organisasi. Siapa tahu bermanfaat bagi orang lain.</p>
        <a class="btn btn-article" href='dashboard/create-article' target="_blank"><i class="fa fa-pencil-square margin-xs-right"></i> Tulis Artikel</a>
        <a class="btn btn-panduan" href='#' target="_blank"><i class="fa fa-info" aria-hidden="true"></i> Panduan Penulisan Artikel </a>
    </div>

</section>


  <div class="container top45">
    <section class="home-articles">
        <div class="container">
          <div class="article-tab-content active" id="article_featured">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 artikel-cari">
              <form method="GET" action="artikel">

                  <input type="text" name="cari" class="input-cari form-control" placeholder="Cari artikel disini ..." value="{{ isset($cari) ? $cari : ''}}">
                  <button class="btn-cari"><i class="glyphicon glyphicon-search"></i></button>

                    </form>
               </div>
          </div>

          <div style="clear:both; margin-bottom: 32px;"></div>
            <div class="row top32" >
              <div class="col-md-8">
                <div class="row">
                  <div class="long-iklan">
                      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
                <div class="content-loop">
                  @if(count($artikel) === 0)
                      <h1 align="center">Maaf saat ini Artikel tidak ada!</h1>
                          <h2 align="center">Buat <a href="dashboard/create-article">artikel</a> ajah yukk</h2>
                          <br/>
                          <br/>
                  @else
                  @foreach ($artikel as $p)

                      <div class="col-md-6">
                        <div class="frame-post">
                            <div class="post-img">
                              <a href="artikel/{{ $p->slug}}">
                                <img data-original="storage/{{ $p->image}}" alt="{{ $p->title }}" class="img-responsive">
                              </a>
                            </div>
                            <div class="isi-post">
                              <?php
                                $id = $p->category_id;
                                $cat = App\Category::where('id','=', $id)->first();
                              ?>
                              <span><a href="category/{{ $cat->slug }}" class="link-category">{{ $cat->name}}</a></span>
                              <h3 class="title-post"><a href="artikel/{{ $p->slug}}" class="link-title"><b>{{ $p->title}}</b></a></h3>
                              <?php
                                $id = $p->author_id;
                                $user = App\User::where('id','=', $id)->first();
                              ?>
                              <!-- <div class="link-author"><a href="author/{{ $user->id }}">{{ $user->name }}   </a><img src="gambar/logokecil.png" width="25px" height="25px"></div> -->
                            </div>
                          </div>


                      </div>
                  @endforeach
                  @endif
                </div>
                  <div class="row text-center">
                    {{ $artikel->links()}}
                  </div>
                  <div class="row">
                    <div class="long-iklan">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
              <div class="col-md-4">
          			<div class="">
          				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          				<!-- kotak 300x250 -->
          				<ins class="adsbygoogle"
          				     style="display:inline-block;width:300px;height:250px"
          				     data-ad-client="ca-pub-8112897684014622"
          				     data-ad-slot="5631607030"></ins>
          				<script>
          				(adsbygoogle = window.adsbygoogle || []).push({});
          				</script>
          			</div>
          			<hr>
          			<div class="">
          				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Iklan Link Responsive -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-8112897684014622"
                                 data-ad-slot="8008300073"
                                 data-ad-format="link"
                                 data-full-width-responsive="true"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
          			</div>
          		</div>
            </div>

        </div>
      </div>
    </section>
  </div>
@endsection
@section('js')
<script>
  $('.cp-jumbotron').lazyLoad({
    effect : "fadeIn"
  });
</script>
@endsection
