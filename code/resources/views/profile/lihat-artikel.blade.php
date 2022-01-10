@extends('master')
@section('title', 'Profile | EX - School')

@section('content')

  <!-- Main Content -->
  <section class="cp-jumbotron">

      <div style="position:relative; z-index:9; text-align:center;">
        <img src="{{ url('storage/'.Auth::user()->avatar) }}" class="avatar"
             style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
             alt="{{ Auth::user()->name }} avatar">
        <h4 style="color:#fff;">{{ ucwords(Auth::user()->name) }}</h4>
      <div class="user-email text-muted" style="color:#fff;">{{ ucwords(Auth::user()->email) }}</div>
      <?php
        $id = Auth::user()->id;
        $point = App\DetailUser::where('users_id','=',$id)->first();
      ?>
      @if(count($point)===1)
      <i>{{ $point->tentang }}</i>
      <a href="{{ $point->media_sosial }}" style="color: #fff;">{{ $point->media_sosial }} <span class="fa fa-share-square"></span></a>
      @endif
      <br>
      <a href="{{ url('dashboard/create-article') }}" class="btn btn-border text-center"><span class="fa fa-calendar-plus-o margin-xs-right"></span> Submit Artikel Baru</a>
  </div>
  </section>
  <div class="row body menu-dashboard">
    <div class="container">
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li class="link"><a href="{{ url('dashboard/profile') }}">PROFILE</a></li>
          <li class="link active"><a href="{{ url('dashboard/article-user') }}">ARTIKELKU</a></li>
          <li class="link"><a href="{{ url('dashboard/event-user') }}">EVENTKU</a></li>
        </ul>
      </div>

    </div>
  </div>
  <div class="container top64">
    	<div class="row" >
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
        <div class="alert alert-info" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Mohon maaf anda tidak bisa mengubah Content Artikel anda secara sepihak, jika ada perubahan di dalam artikel silakan hubungi admin EX - SCHOOL di E-Mail kami : exschool.id@gmail.com
        </div>
          @foreach ($post as $p)
            <div class="content-loop">
              <div class="col-md-3">
                <div class="frame-post">
                    <div class="post-img">
                      <a href="{{ url('artikel/'.$p->slug) }}">
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
                      <div class="link-author"><a href="{{ url('author/'.$user->id) }}">{{ $user->name }}   </a><img src="{{ url('gambar/logokecil.png') }}" width="25px" height="25px"></div>

                      @if ($p->author_id)
                      <div class="btn-pojok"><a href="{{ url('dashboard/article-user/'.$p->id) }}" class="btn-hapus">Hapus</a></div>
                      @else
                      <div></div>
                      @endif
                    </div>
                  </div>
                </div>

              </div>
          @endforeach
          </div>
    </div>
@endsection
