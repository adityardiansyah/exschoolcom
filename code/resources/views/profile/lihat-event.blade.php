@extends('master')
@section('title', 'Profile | EX - School')

@section('content')

  <!-- Main Content -->

  <div class="row body menu-dashboard top64">
    <div class="container">
      <nav class="line-nav">
        <ul>
          <li class="link-menu"><a href="{{ url('dashboard/profile') }}">DASHBOARD</a></li>
          <li class="link-menu"><a href="{{ url('dashboard/article-user') }}">ARTIKELKU</a></li>
          <li class="link-menu active"><a href="{{ url('dashboard/event-user') }}">EVENTKU</a></li>
        </ul>
      </nav>

    </div>
  </div>

  <div class="container top64">
    	<div class="row">
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
        <div class="alert alert-info">

          <h4>Silakan Konfirmasi ke DM Instagram kami @exschool_com untuk informasi lebih lanjut!</h4>
          <b>Mohon kerjasamanya dalam pemenuhan persyaratannya. Terima Kasih</b>
          <br><br>
          Mohon maaf anda tidak bisa mengubah konten Event anda secara sepihak, jika ada perubahan di dalam Event silakan hubungi admin EX - SCHOOL di E-Mail kami : exschool.id@gmail.com
        </div>

        <div class="page-content container-fluid" style="overflow:scroll;">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Event</th>
                                        <th>Paket Kerjasama</th>
                                        <th>Tanggal Pelaksanaan</th>
                                        <th>Status Event</th>
                                        <th class="actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($event as $events)
                                    <tr>
                                        <td>{{ $events->judul }}</td>
                                        <td>{{ $events->kouta}}</td>
                                        <td>{{ date('j F Y', strtotime($events->tanggalPelaksanaan)) }}</td>
                                        <td>{{ $events->publish}}</td>
                                        <td class="no-sort no-click">

                                                <!-- <a href="{{ url('dashboard/event-user/'.$events->id)}}" class="btn-sm btn-danger delete" >
                                                    <i class="voyager-trash"></i> Delete
                                                </a> -->


                                                {{-- <a href="" class="btn-sm btn-primary pull-right edit">
                                                    <i class="voyager-edit"></i> Edit
                                                </a> --}}

                                                <a href="{{ url('event/'.$events->slug)}}" class="btn-sm btn-warning ">
                                                    <i class="voyager-eye"></i> View
                                                </a>

                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    		{{-- @foreach($events as $event)
			<div class="col-md-4">
				<div class="post-item">
					<div class="post-thumb">
						<a href="/event/{{ $event->slug }}"><img src="/storage/{{ $event->cover }}"></a>
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
								{{ $event->lokasi }}
							</p>

						</div>

						@if ($event->author_id)

	                      <div class="btn-pojok"><a href="/dashboard/event-user/{{ $event->id }}" class="btn-hapus">Hapus</a></div>

	                     @else

	                      <div class="post-button">
								<a href="/event/{{ $event->slug }}" class="btn btn-default btn-next">Lihat Detail</a>
							</div>

	                     @endif

					</div>
				</div>
			</div>
		@endforeach --}}
    	</div>
    </div>
@endsection
