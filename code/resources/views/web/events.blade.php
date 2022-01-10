@extends('master')

@section('title', 'Event - EX - School')


@section('content')
<section class="cp-event" style="background: url(gambar/event1.jpg)center bottom; background-attachment: fixed;">
	<div class="container text-center text-header">
	  <h1>Event</h1>
	  <div class="margin-lg-top">
	    <a href="{{ url('dashboard/event') }}" class="btn btn-lg btn-event record-data"><span class="fa fa-calendar-plus-o margin-xs-right"></span> Buat Event Baru</a>
	    <a href="{{ url('publikasi-event') }}" target="_blank" class="btn btn-border btn-lg margin-sm-left record-data" data-action="how-to-submit-event" data-position="jumbotron">Cara Menjadi Media Partner <span class="fa fa-question-circle-o margin-xs-right"></span></a>
    </div>
	</div>
</section>

	<div class="container top64">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 artikel-cari">
				<form method="GET" action="{{ url('event') }}">
				  <input type="text" name="cari" class="input-cari form-control" placeholder="Search ..." value="{{ isset($cari) ? $cari : ''}}">
				  <button class="btn-cari"><i class="glyphicon glyphicon-search"></i></button>
			  </form>
			</div>
		</div>
		<br>
		<!-- Iklan -->
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
			<!-- End Iklan-->
		<div class="row top32" style="font-family: Gotham-Rounded;">
		@if(count($events) === 0)
				<h1 align="center">Maaf saat ini Event tidak ada!</h1>
	      <h2 align="center">Kirim <a href="{{ url('dashboard/event') }}">Event Saya</a></h2>
				<br/>
				<br/>
		@else
		@foreach($events as $event)
			<div class="col-md-3">
				<div class="post-item">
					<div class="tumb-event">
						<a href="{{ url('event/'.$event->slug) }}">
							<img src="storage/{{ $event->poster }}" class="tumb-img-event img-responsive event-zoom" style="width: 100%;">
						</a>
					</div>
					<div class="post-body">
						<div class="post-category">
							<?php
								$id = $event->event_category_id;
								$kat = App\EventCategory::where('id','=',$id)->first();
							?>
							<a href="{{ url('category-event/'.$kat->slug) }}">{{ $kat->nama }}</a>
						</div>
						<h3 class="post-title">
							<a href="{{ url('event/'.$event->slug) }}" class="link-title">{{ $event->judul }}</a>
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
						<div class="post-button">
								<a href="{{ url('event/'.$event->slug) }}" class="btn btn-default btn-next">Lihat Detail</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		@endif
		</div>
		<div class="row">
			{{ $events->links() }}
		</div>
		<!-- Iklan -->
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
			<!-- End Iklan-->
	</div>
	<div class="container">
        <div class="row top32">
          <div class="row">
            <div class="col-md-12">
              <h3><i class="glyphicon glyphicon-calendar"></i>EVENT KEMARIN</h3>
            </div>
           </div>
           <br/>
            <div class="row">
              @if(count($event_kemarin) === 0)
                  <h2 align="center">Maaf saat ini Event tidak ada!</h2>
                      <h3 align="center">Kirim <a href="/dashboard/event">Event Saya</a></h3>
                      <br/>
                      <br/>
              @else
              @foreach($event_kemarin as $eventk)
                <div class="col-md-4">
                  <div class="post-item">
                    <div class="tumb-event">
                      <a href="{{ url('event/'.$eventk->slug) }}"><img src="storage/{{ $eventk->poster }}" class="tumb-img-event"></a>
                    </div>
                    <div class="post-body">
                      <div class="post-category">
                        <?php
                          $id = $eventk->event_category_id;
                          $kat = App\EventCategory::where('id','=',$id)->first();
                        ?>
                        <a href="{{ url('category-event/'.$kat->slug) }}">{{ $kat->nama }}</a>
                      </div>
                      <h3 class="post-title">
                        <a href="{{ url('event/'.$eventk->slug) }}" class="link-title">{{ $eventk->judul }}</a>
                      </h3>
                      <div class="post-info">
                        <p class="margin-xs-bottom">
                          <span class="post-time-upcoming">
                            <span class="fa fa-calendar fa-fw"></span>
                            {{ date("F j, Y ", strtotime($eventk->tanggalPelaksanaan)) }}
                          </span>
                        </p>
                        <p>
                          <span class="fa fa-map-marker fa-fw"></span>
                          {{ $eventk->kota }}
                        </p>

                      </div>
                      <div class="post-button">
                          <a href="{{ url('event/'.$eventk->slug) }}" class="btn btn-default btn-next">Lihat Detail</a>
                      </div>
                    </div>
                  </div>
                </div>

              @endforeach
              @endif

                  <br/>
                  </div>
        </div>
        <div class="row">
              <div class="text-center">{{ $event_kemarin->links() }}</div>
          </div>
				<!-- Iklan -->
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
				<!-- End Iklan-->
				<br/>
				<br/>
	</div>

@endsection
