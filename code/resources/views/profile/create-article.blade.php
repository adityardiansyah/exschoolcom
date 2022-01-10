@extends('master')

@section('title','Tulis Artikel | EX - School')
@section('css')


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">


@endsection
@section('content')

  <div class="row body top64 menu-dashboard">
  	<div class="container">
  		<div class="navbar-collapse collapse">
  			<ul class="nav navbar-nav navbar-left">
				<li class="link"><a href="{{ url('dashboard/profile') }}">DASHBOARD</a></li>
	  			<li class="link"><a href="{{ url('dashboard/article-user') }}">ARTIKELKU</a></li>
				<li class="link"><a href="{{ url('dashboard/event-user') }}">EVENTKU</a></li>
	  		</ul>
  		</div>

  	</div>
  </div>
  	<div class="row body">
  		<div class="container">
  			<div class="row">
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
		        <div class="col-md-7">
		            <h1>Article Posting Form</h1>
		         </div>
		       	<div class="col-md-5" style="margin-top:28px;">

				</div>
				<div class="row">
                <div class="col-md-12">

                    <div class="dashboard-content-item">

						<form id="form-edit" action="/dashboard/create-article" method="post" enctype="multipart/form-data">

							<input type="hidden" name="_token" value="{{ csrf_token() }}">


							<div class="alert alert-warning">
									Baca lagi dengan seksama <a class="link" href="/panduan-publikasi-artikel">syarat dan ketentuan publikasi Artikel</a> di EX-School. Jika kamu mengisi form publikasi acara ini, maka kami anggap kamu sudah menyetujui syarat dan ketentuan yang berlaku.
								</div>



							<div class="form-group">
								<label>Judul Artikel</label>
								<input class="form-control input-title" name="title" id="post_title" placeholder="Ketik judul disini" size="50"  required />
							</div>

							<div class="form-group">
									<label>Kategori (* required)</label>
									<div class="form-hint margin-xs-bottom">Pilih Kategori artikel.</div>
									<?php
										$kategori = App\Category::all();
									?>
									<select name="category_id" id="event_status" class="form-control">
										<option value="" selected>Pilih ..</option>
										@foreach($kategori as $kat)
										<option value="{{ $kat->id }}"  >{{ $kat->name }}</option>
										@endforeach
									</select>
							</div>

							<div class="form-group">
								<label>Cover</label>
								<div class="form-hint margin-xs-bottom">Harap memasukan cover indah berukuran 700x350.</div>

								<div class="margin-md-bottom" id="cover_container">
								</div>

								<input type="file" name="image" id="cover" class="form-control dropify"  required="" />


							</div>

							<div class="form-group">
								<label>Isi</label>
								<div class="form-hint">Silakan Tulis Artikel anda dengan baik dan bermanfaat.</div>
								<textarea name="body" class="richTextBox"></textarea>
							</div>

							<div class="form-group">
								<label>Ringkasan</label>
								<div class="form-hint">Tuliskan Penjelasan singkat dari Deskripsi anda!</div>
								<input class="form-control input-title" name="exceprt" id="post_title" placeholder="Ketik inti Deskripsi" size="50"  required="" />
							</div>

							<div class="form-group">
								<label>Tags</label>
								<div class="form-hint">Masukkan kata-kata kunci yang digunakan di dalam artikel. <b>Berilah tanda koma (,) atau Enter</b> untuk memisahkan kata kunci satu dengan yang lainnya.</div>
								<input type="text" name="meta_keywords" id="tags" class="form-control" />
							</div>

							<div class="alert alert-info">Klik "<strong>Save Event</strong>" untuk menyimpan tulisan. <a href="/dashboard/article" target="_blank" class="link">daftar artikelmu</a> agar bisa direview oleh moderator. Lihat <a href="/panduan-penulisan-artikel" target="_blank" class="link" data-action="how-to-submit-article" data-position="user-dashboard-article">syarat dan ketentuan</a> penulisan di EX - School</div>


							<input type="submit" class="btn btn-log btn-save btn-lg margin-xs-right" value="Save Artikel" >

						</form>
                    </div>

                </div>
            </div>
			</div>
		</div>
	</div>

@endsection
@section('js')
<script>
	$(document).ready(function(){

	 $('#tags').tokenfield({
	  autocomplete:{
	   source: ['edukasi','sekolah','Trik','Tips','Ilmu Pengetahuan','IPA','IPS','Informasi','pendaftaran','menarik','event','artikel','sukses','SMA','SMK','SMP'],
	   delay:100
	  },
	  showAutocompleteOnFocus: true
	 });
	});
  $('.dropify').dropify({
    messages: {
      'default': 'Seret dan Letakkan Gambar disini atau Klik disini!',
      'replace': 'Seret dan Letakkan Gambar disini atau Klik untuk mengganti!',
      'remove':  'Hapus',
      'error':   'Ooops, Yang kamu upload bukan Gambar!.'
    }
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
@endsection
