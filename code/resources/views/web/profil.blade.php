@extends('master')
@section('title', 'Profile | EX - School')

@section('content')

  <!-- Main Content -->
  <section class="cp-jumbotron">

      <div style="position:relative; z-index:9; text-align:center;">
        <img src="{{ url('../../storage/'.$user->avatar) }}" class="avatar"
             style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
             alt="{{ $user->name }}">
        <h4 style="color:#fff;">{{ $user->name }}</h4>
      <?php
        $id = $user->id;
      ?>

  </div>
  </section>
  <div class="row body menu-dashboard">

  <div class="container">
      <div class="row top32">
      	@foreach ($post as $p)
            <div class="content-loop">
              <div class="col-md-3">
                <div class="frame-post">
                    <div class="post-img">
                      <a href="/artikel/{{ $p->slug}}">
                        <img src="/storage/{{ $p->image}}" alt="{{ $p->title }}" class="img-responsive">
                      </a>
                    </div>
                    <div class="isi-post">
                      <?php
                        $id = $p->category_id;
                        $cat = App\Category::where('id','=', $id)->first();
                      ?>
                      <span><a href="/category/{{ $cat->slug }}" class="link-category">{{ $cat->name}}</a></span>
                      <h3 class="title-post"><a href="/artikel/{{ $p->slug}}" class="link-title"><b>{{ $p->title}}</b></a></h3>
                      <?php
                        $id = $p->author_id;
                        $user = App\User::where('id','=', $id)->first();
                      ?>
                      <!-- <div class="link-author"><a href="/author/{{ $user->id }}">{{ $user->name }}   </a><img src="../gambar/logokecil.png" width="25px" height="25px"></div> -->

                    </div>
                  </div>
                </div>

              </div>
          @endforeach
      </div>
  </div>
@endsection
