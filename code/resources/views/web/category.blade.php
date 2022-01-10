@extends('master')

@section('title')
Category - EX - School
@endsection

@section('content')
<section class="cp-jumbotron">
	<div class="container text-center text-header">

	    	<h3>Kategori</h3>
    		<h1>{{ $category->name }}</h1>

    </div>
</section>
<div class="container top64">
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
	<div class="row" >
      @foreach ($post as $p)
        <div class="content-loop">
          <div class="col-md-4">
            <div class="frame-post">
                <div class="post-img">
                  <a href="{{ url('artikel/'.$p->slug)}}">
                    <img src="{{ url('storage/'.$p->image)}}" alt="{{ $p->title }}" class="img-responsive">
                  </a>
                </div>
                <div class="isi-post">
                  <?php
                    $id = $p->category_id;
                    $cat = App\Category::where('id','=', $id)->first();
                  ?>
                  <span><a href="{{ url('category/'.$cat->slug) }}" class="link-category">{{ $cat->name}}</a></span>
                  <h3 class="title-post"><a href="{{ url('artikel/'.$p->slug)}}" class="link-title"><b>{{ $p->title}}</b></a></h3>
                  <?php
                    $id = $p->author_id;
                    $user = App\User::where('id','=', $id)->first();
                  ?>
                  <!-- <div class="link-author"><a href="{{ url('author/'.$user->id) }}">{{ $user->name }}   </a><img src="{{ url('gambar/logokecil.png') }}" width="25px" height="25px"></div> -->
                </div>
              </div>
            </div>

          </div>
      @endforeach
      </div>
			<div class="row text-center">
				{{ $post->links()}}
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
			<br>
</div>
@endsection
