@extends('master')
@section('title', 'Profile | EX - School')
<style>
  .frame-avatar{
    margin: auto;
    width: 150px;
    height: 150px;

  }
  .avatar {
  opacity: 1;
  display: block;
  width: 150px;
  height: 150px;
  transition: .5s ease;
  border-radius:50%;
  border:3px solid #fff;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.frame-avatar:hover .avatar {
  opacity: 0.3;
}

.frame-avatar:hover .middle {
  opacity: 1;
}
.text {
  background-color: #fff;
  color: #07c;
  border:1px solid #fff;
  border-radius: 2px;
  font-size: 16px;
  padding: 16px 32px;
}
</style>
@section('content')

  <!-- Main Content -->
  <section class="cp-jumbotron">

      <div style="position:relative; z-index:9; text-align:center;">
        <div class="frame-avatar">
        <img src="{{ url('storage/'.$user->avatar) }}" class="avatar"
             alt="{{ Auth::user()->name }}">
             <div class="middle">
                <a href="{{ url('dashboard/edit-avatar/'. Auth::user()->id) }}" class="text">Ganti Avatar</a>
             </div>
        </div>
        <h2 style="color:#fff;">{{ ucwords(Auth::user()->name) }}</h2>
        <a href=""></a>
        <?php
          $id = Auth::user()->id;
          $point = App\DetailUser::where('users_id','=',$id)->first();
        ?>
        {{-- @if(count($point)===1)
        <i>{{ $point->tentang }}</i>
        <a href="{{ $point->media_sosial }}" style="color: #fff;">{{ $point->media_sosial }} <span class="fa fa-share-square"></span></a>
        @endif --}}
        <br>
        <br>
        <a href="{{ url('dashboard/edit-profil/'.$id) }}" class="btn-border" style="padding: 8px; border:2px solid #fff;">Lengkapi Profil</a>
  </div>
  </section>
  <div class="row body menu-dashboard">
    <div class="container">
      <nav class="line-nav">
        <ul>
          <li class="link active"><a href="/dashboard/profile">DASHBOARD</a></li>
          <li class="link"><a href="/dashboard/article-user">ARTIKELKU</a></li>
          <li class="link"><a href="/dashboard/event-user">EVENTKU</a></li>
        </ul>
      </nav>

    </div>
  </div>
  <div class="container">
    <section class="user-dashboard-content">
        <div class="container">
        <br/>
            <h1>User Dashboard</h1>


            <div class="row">
                <div class="col-md-7">
                    <div class="dashboard-content-item">
                        <h4 class="dashboard-title">Hallo {{ Auth::user()->name }},</h4>

                        <p>Selamat datang di halaman user dashboard. Melalui halaman ini kamu bisa memantau semua aktivitas yang kamu lakukan di EX-School.
                            Mari berkontribusi untuk Anak bangsa, dapatkan informasi di dalam ekstrakurikuler yang kamu sukai.</p>

                        <p>Tetap menjadi generasi yang berguna untuk Indonesia, Saya adalah Pemuda Indonesia !</p>

                        <p>Salam Pemuda!</p>
                    </div>


                    <div class="dashboard-content-item">
                        <h4 class="dashboard-title">Event Terdekat</h4>
                        <?php

                          $events = App\Event::where([
                                                      ['tanggalPelaksanaan', '>=', date("Y/m/d")],
                                                      ])
                                                      ->whereIn('publish', ['publish','utama'])
                                                      ->orderBy('tanggalPelaksanaan','asc')->limit(4)->get();
                        ?>
                        <div class="row top64" style="font-family: Gotham-Rounded;">

                      @if(count($events) === 0)
                          <h1 align="center">Maaf saat ini Event tidak ada!</h1>
                              <h2 align="center"><a href="{{ url('dashboard/event') }}">Upload Event Sekarang</a> </h2>
                              <br/>
                              <br/>
                      @else

                      @foreach($events as $event)


                        <div class="col-md-6">
                        <div class="post-item">
                          <div class="tumb-event">
                                      <a href="{{ url('event/'.$event->slug) }}"><img src="{{ url('storage/'.$event->poster) }}" class="tumb-img-event"></a>
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
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="dashboard-content-item">
                        <h4 class="dashboard-title">Buat Artikel</h4>

                        <p>Berbagi Pengalaman dan Ilmu ke sesama</p>

                        <p><a href="{{ url('dashboard/create-article') }}" class="btn-artikel text-center btn-block record-data" data-action="submit-article" data-position="user-dashboard-overview"><i class="fa fa-pencil-square margin-xs-right"></i> Tulis Artikel</a></p>

                        <p>Kunjungi: <a href="{{ url('panduan-publikasi-artikel') }}" class="record-data" data-action="how-to-submit-article" data-position="user-dashboard-overview">Panduan cara berkontribusi artikel di Ex-School</a></p>
                    </div>


                    <div class="dashboard-content-item">
                        <h4 class="dashboard-title">Uploud Event Kalian</h4>

                        <p>Publikasikan acara Ekstrakurikuler kamu melalui Ex-School</p>

                        <p><a href="{{ url('dashboard/event') }}" class="btn btn-default btn-xl btn-block record-data" data-action="submit-event" data-position="user-dashboard-overview"><i class="fa fa-calendar-check-o margin-xs-right"></i> Publikasi Acara</a></p>

                        <p>Kunjungi: <a href="{{ url('publikasi-event') }}" class="record-data" data-action="how-to-submit-event" data-position="user-dashboard-overview">Cara Publikasi Event di Ex-School</a></p>
                    </div>



                </div>
            </div>

        </div>
    </section>
  </div>
  <br/>
  <br/>
@endsection
