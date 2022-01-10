@extends('master')
@section('title', 'Edit Profile - EX - SCHOOL')

@section('content')
<div class="container top64">
	<div class="row">
		<div class="bg-white" style="padding: 32px; margin-top: 32px;">
		<h2>Edit Profil</h2>
		<div class="row">
			<div class="col-md-5 col-md-offset-3">
				@if($message = Session::get('Berhasil'))
                            <div class="alert alert-success">
                              <p>
                                {{ $message }}
                              </p>
                            </div>
                            @endif
                            @if($message = Session::get('Gagal'))
                              <div class="alert alert-warning">
                                <p>
                                  {{ $message }}
                                </p>
                              </div>
                            @endif
				<form action="{{ url('dashboard/edit-profil/'.$user->id)}}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="users_id" value="{{ $user->id}}">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group">
						<label>Nama</label>
						<input class="form-control input-title" name="name" id="post_title" placeholder="Ketik judul disini" size="50" value="{{ $user->name }}"/>
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input class="form-control input-title" type="date" name="tgl_lahir" id="post_title" size="50" value="" />
					</div>
					<div class="form-group">
						<label>Asal Sekolah</label>
						<input class="form-control input-title" name="asal_sekolah" id="post_title" size="50" value="" />
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input class="form-control input-title" type="text" name="telepon" id="post_title" placeholder="No Telepon" size="50" value="" />
					</div>
					<div class="form-group">
						<label>Media Sosial</label>
						<input class="form-control input-title" name="media_sosial" id="post_title" placeholder="Media Sosial" size="50" value="" />
					</div>
					<div class="form-group">
						<label>Tentang diri anda</label>
						<textarea class="form-control" name="tentang"></textarea>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat"></textarea>
					</div>

					<input type="submit" class="btn btn-log btn-save margin-xs-right" value="Simpan Edit Profil">
				</form>
			</div>
		</div>
	</div>
</div>
</div>

@endsection
