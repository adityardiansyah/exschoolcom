@extends('master')

@section('title')
Category Event - EX - School
@endsection

@section('content')
<section class="cp-jumbotron">
	<div class="container text-center text-header">

	    	<h2>Kategori {{ $category->nama}}</h2>

    </div>
</section>
<div class="container top64">
	<div class="row" >
      @foreach($events as $event)
      <div class="col-md-4">
        <div class="post-item">
          <div class="tumb-event">
            <a href="/event/{{ $event->slug }}"><img src="/storage/{{ $event->poster }}" class="tumb-img-event"></a>
          </div>
          <div class="post-body">
            <div class="post-category">
              <?php
                $kat = App\EventCategory::where('id','=',$event->event_category_id)->first();
              ?>
              <a href="#">{{ $kat->nama }}</a>
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
                {{ $event->lokasi }}
              </p>
              
            </div>
            <div class="post-button">
                <a href="/event/{{ $event->slug }}" class="btn btn-default btn-next">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
      </div>
</div>
@endsection