@extends('master')
@section('title')
  Publikasi Event
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/dropify-master/dist/css/dropify.css')}}" />

<style media="screen">
body{background: #189cfa;}
  .nav-dashboard{list-style: none;  }
  .link-menu{padding: 14px 16px; float: left;}
  .link-menu a{ color: #fff;}
  .font-putih {color: #fff;}
  .box-paket{background: #fff; color:#000; border-radius: 8px;}
  label{color: #000;}
</style>
@endsection

@section('content')

  <div class="top64 menu-dashboard">
  	<div class="container">
  			<ul class="nav-dashboard">
	  			<li class="link-menu"><a href="{{ url('dashboard/profile') }}">PROFILKU</a></li>
	  			<li class="link-menu"><a href="{{ url('dashboard/article-user') }}">ARTIKELKU</a></li>
          		<li class="link-menu"><a href="{{ url('dashboard/event-user') }}">EVENTKU</a></li>
	  		</ul>

  	</div>
  </div>

  		<div class="container font-putih">
        <div class="padding8">
          <h1>Publikasi Event</h1>
          <br>
          <p>Khusus Event tingkat Sekolah dapat bekerja sama dengan EX-SCHOOL</p>
          <p>Sudah puluhan Event yang sudah bekerja sama dengan kami!</p>
          <b>GRATIS kok...</b>
          <p>Mari ikuti persyaratan berikut dengan seksama</p>
        </div>
          <br>
          <div style="background:#333;" id="syarat" style="border-radius:8px;">
            <div class="padding8">
              <h3>Syarat Media Partner sangat mudah sekali :</h3>
              <ol>
                <li>WAJIB Memasang Logo EX-SCHOOL di Media Cetak seperti : Pamflet, Poster, Banner, dll. <br> <a href="https://drive.google.com/open?id=1NJSnaHqeJFZE28VFhzQ95q0LmnnoRKog" target="_blank">DOWNLOAD SALAH SATU LOGO EX-SCHOOL DISINI</a></li></b><br>
                <li>WAJIB Follow Instagram Kami @exschool_com</li>
                <li>Event yang akan di Publikasi paling tidak, memiliki tenggat waktu minimal 2 minggu sebelum pelaksanaan</li>
                <br>
                <b>Jika kamu kesulitan silakan hubungi kami lewat Email kami DM Instagram Kami @exschool_com atau WA : 0857 0723 0447 </b>
              </ol>
              <b>
                <p>Beberapa manfaat yang akan didapatkan ketika melakukan publikasi acara atau bekerjasama sebagai media partner dengan EX - SCHOOL adalah sebagai berikut:</p>
              </b>
              <ol>
                <li>Acara akan dipublikasikan pada website EX - SCHOOL</li>
                <li>Acara akan dipublikasikan pada akun media sosial resmi EX - SCHOOL (Instagram & Story Instagram)</li>
              </ol>
            </div>
            <div class="padding8">
              <h3>Ketentuan Non Media Partner</h3>
              <p>Beberapa ketentuan untuk Non Media Partner sebagai berikut:</p>

              <ol>
                  <li>Tidak di Wajibkan memasang Logo EX-SCHOOL</li>
                  <br>
                  <b>Jika kamu kesulitan silakan hubungi kami lewat Email kami DM Instagram kami @exschool_com atau WA : 0857 0723 0447 </b>
              </ol>
              <b>Keuntungan Jika tidak Bekerjasama : </b>
              <ol>
                <li>Acara akan dipublikasikan pada website EX - SCHOOL</li>
              </ol>
            </div>
            <div class="padding8">
              <h4 class="margin-lg-top">Catatan : </h4>

              <p>EX - SCHOOL hanya akan mempublikasi acara yang memenuhi persyaratan waktu sebagai berikut:</p>

              <ul>
                <li>Event yang akan disubmit adalah event yang belum kadaluarsa atau belum terlewat waktu pelaksanaannya</li>
                <li>Event yang telah terlewat waktu pelaksanaannya tidak akan dipublikasi</li>
                <li>Event yang akan disubmit paling tidak, memiliki tenggat waktu minimal 2 minggu sebelum pelaksanaan</li>
              </ul>
            </div>
          </div>
          <!--<div class="row text-center">-->
          <!--  <h2>Paket Media Partner EX-SCHOOL</h2>-->
          <!--  <p>Semua Event tingkat Sekolah bisa bekerja sama dengan kami</p>-->
          <!--</div>-->
          <!--<div class="container padding8">-->
          <!--  <div class="col-md-4">-->
          <!--    <div class="box-paket padding8">-->
          <!--      <img src="../gambar/paket/BASICX.png" alt="" class="img-responsive">-->
          <!--    </div>-->

          <!--  </div>-->
          <!--  <br>-->
          <!--  <div class="col-md-4">-->
          <!--    <div class="box-paket padding8">-->
          <!--      <img src="../gambar/paket/SILVERX.png" alt="" class="img-responsive">-->
          <!--    </div>-->

          <!--  </div>-->
          <!--  <br>-->
          <!--  <div class="col-md-4">-->
          <!--    <div class="box-paket padding8">-->
          <!--      <img src="../gambar/paket/GOLDX.png" alt="" class="img-responsive">-->
          <!--    </div>-->

          <!--  </div>-->
          <!--  <br>-->
          <!--  <br>-->
          <!--  <div class="container text-center">-->
          <!--    <a href="https://drive.google.com/open?id=1NJSnaHqeJFZE28VFhzQ95q0LmnnoRKog" target="_blank" style="padding:16px 24px; background:#fff; border:2px solid #000; border-radius:8px; color:#000; font-weight:bold;">DOWNLOAD LOGO</a>-->
          <!--  </div>-->
          <!--</div>-->
          <!--<hr>-->
          <!--<div class="container text-center top32">-->
          <!--  <h2>Paket Khusus Media Partner EX-SCHOOL dan Pembaris Jawa Barat</h2>-->
          <!--  <p>Paket ini di khususkan untuk Event Baris-berbaris seperti (Paskibra, Pramuka, dan sejenisnya) yang Eventnya tingkat (Nasional, Se-Jawa Barat, Se-Jawa-Timur(open), se-Jawa Tengah(open), dst)</p>-->
          <!--  <p>Jika kamu memilih paket ini otomatis event kamu di POST ke Media Sosial EX-SCHOOL dan ANAK PEJABAT</p>-->
          <!--</div>-->
          <!--<div class="container padding8">-->
          <!--  <div class="col-md-4">-->
          <!--    <div class="box-paket padding8">-->
          <!--      <img src="../gambar/paket/BASIC.png" alt="" class="img-responsive">-->

          <!--    </div>-->

          <!--  </div>-->
          <!--  <br>-->
          <!--  <div class="col-md-4">-->
          <!--    <div class="box-paket padding8">-->
          <!--      <img src="../gambar/paket/SILVER.png" alt="" class="img-responsive">-->
          <!--    </div>-->

          <!--  </div>-->
          <!--  <br>-->
          <!--  <div class="col-md-4">-->
          <!--    <div class="box-paket padding8">-->
          <!--      <img src="../gambar/paket/GOLD.png" alt="" class="img-responsive">-->
          <!--    </div>-->

          <!--  </div>-->
          <!--  <br>-->
          <!--  <br>-->
          <!--  <div class="container text-center">-->
          <!--    <a href="https://drive.google.com/file/d/1U42B35-KVMLOJE2JvWlIf2c1QHElRgBh/view?usp=drivesdk" target="_blank" style="padding:16px 24px; background:#fff; border:2px solid #000; border-radius:8px; color:#000; font-weight:bold;">DOWNLOAD LOGO</a>-->
          <!--  </div>-->

          <!--</div>-->
				<!-- Modal -->
				  {{-- <div class="modal fade" id="myModal" role="dialog">
				    <div class="modal-dialog">

				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Modal Header</h4>
				        </div>
				        <div class="modal-body">
				          <iframe width="760" height="815" src="https://www.youtube.com/embed/AtkY-DwfKdE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>

				    </div>
				  </div> --}}
		       	<div class="col-md-5" style="margin-top:28px;">

				</div>
				<div class="row">
                <div class="col-md-12">

                    <div class="dashboard-content-item">

						<form id="form-edit" action="{{ url('dashboard/event') }}" method="post" enctype="multipart/form-data">

							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                  </ul>
                 </div>
                @endif

							<div class="alert alert-warning">
									Baca lagi dengan seksama <a class="link" href="#syarat">syarat dan ketentuan publikasi event</a> di EX-School. Jika kamu mengisi form publikasi acara ini, maka kami anggap kamu sudah menyetujui syarat dan ketentuan yang berlaku.
								</div>

                <div class="form-group">
  									<!--<label>Pilih Paket Kerjasama (* harus diisi)</label>-->
                                    <input type="hidden" name="kouta" value="Paket Basic">
  									<!--<select name="kouta" id="event_status" class="form-control">-->
           <!--           <option value="Kosong" selected>Pilih Paket...</option>-->
           <!--           <option value="Paket Basic">Paket Basic</option>-->
  									<!--	<option value="Paket Silver">Paket Silver</option>-->
           <!--           <option value="Paket Gold">Paket Gold</option>-->
            <!--          <option value="Paket Basic">Paket Basic X PEJABAT</option>-->
  										<!--<option value="Paket Silver">Paket Silver X PEJABAT</option>-->
            <!--          <option value="Paket Gold">Paket Gold X PEJABAT</option>-->
  									</select>
  							</div>

							<div class="form-group">
								<label>Nama Acara</label>
								<input class="form-control input-title" name="judul" id="post_title" placeholder="Ketik disini ..." size="50" required value="{{ old('judul')}}" />
							</div>

							<div class="form-group">
									<label>Kategori (* harus diisi)</label>
									<?php
										$kategori = App\EventCategory::all();
									?>
									<select name="event_category_id" id="event_status" class="form-control">
										<option value="" selected>Pilih ..</option>
										@foreach($kategori as $kat)
										<option value="{{ $kat->id }}"  >{{ $kat->nama }}</option>
										@endforeach
									</select>
							</div>

              <div class="row">
                  <div class='col-md-6'>
                      <div class="form-group">
                        <label>Tanggal di laksanakan (* harus diisi)</label>
                          <div class='input-group date' id='datetimepicker6'>
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <input type='text' name="tanggalPelaksanaan" class="form-control datepicker" required value="{{ old('tanggalPelaksanaan')}}"/>
                          </div>
                      </div>
                  </div>
                  <div class='col-md-6'>
                      <div class="form-group">
                        <label>Tanggal Berakhir (* harus diisi)</label>
                          <div class='input-group date' id='datetimepicker7'>
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                              <input type='text' name="tanggalBerakhir" class="form-control datepicker" required value="{{ old('tanggalBerakhir')}}" />
                          </div>
                      </div>
                  </div>
              </div>

              {{-- <div class="form-group">
                <label>Waktu Pelaksanaan (* required)</label>
                <input class="form-control" type="text" name="waktuPelaksanaan" id="event_waktu" size="50" required value="{{ old('tanggalPelaksanaan')}}"/>
              </div> --}}

              <div class="form-group">
                <label>Kota (* harus di isi)</label>
                <div class="form-hint margin-xs-bottom">Masukkan kota tempat dimana acara akan diselenggarakan.</div>
                <input class="form-control" type="text" name="kota" id="event_kota" size="50" value="" required value="{{ old('kota')}}"/>
              </div>

              {{-- <div class="form-group">
                <label>Alamat Lokasi (* harus di isi)</label>
                <div class="form-hint margin-xs-bottom">Masukkan alamat lengkap tempat dimana acara akan diselenggarakan.</div>
                <input class="form-control" type="text" name="lokasi" id="event_lokasi" size="50" required value="{{ old('lokasi')}}"/>
              </div> --}}

							{{-- <div class="form-group">
									<label>Jenis Event (* harus di isi)</label>
									<div class="form-hint margin-xs-bottom">Pilih status acara apakah <em>free</em> atau berbayar.</div>
									<select name="status" id="event_status" class="form-control">
										<option value="" selected>Pilih ..</option>
										<option value="Free"  >Free</option>
										<option value="Berbayar"  >Berbayar</option>
									</select>
								</div> --}}

                <div class="form-group">
  								<label>Deskripsi Event</label>
  								<div class="form-hint">Silakan Tulis Deskripsi Event anda, Jika anda butuh Icon yang menarik silakan gunakan <a href="http://fontawesome.io/icons/">Icon Font Awesome</a> *diharap icon  jangan copas dari media lain</div>
  								<textarea name="deskripsi" class="form-control richTextBox"></textarea>
  							</div>

								<div class="form-group">
									<label>Poster</label>
									<div class="form-hint margin-xs-bottom">Pamflet harus ada Logo EX-SCHOOL, Maksimal ukuran poster 2 Mb</div>
									<div class="margin-md-bottom" id="cover_container"></div>
									<input type="file" name="poster" id="cover" class="form-control dropify"  required />
								</div>


							<div class="alert alert-info">Klik "<strong>Save Event</strong>" untuk menyimpan tulisan. <a href="/dashboard/event-user" target="_blank" class="link">daftar event</a> agar bisa direview oleh moderator. Lihat <a href="/publikasi-event" target="_blank" class="link" >syarat dan ketentuan</a> penulisan di EX - School</div>


							<input type="submit" class="btn btn-log btn-save btn-lg margin-xs-right" value="Save Event" >

						</form>
                    </div>

                </div>
            </div>
			</div>
		</div>
@endsection
@section('js')
<script type="text/javascript" src="{{asset('assets/dropify-master/dist/js/dropify.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.tagsinput.min.js') }}"></script>
<script src="../vendor/tcg/voyager/assets/lib/js/tinymce/tinymce.min.js"></script>
<script src="../vendor/tcg/voyager/assets/js/voyager_tinymce.js"></script>
<script type="text/javascript" src="{{asset('assets/datepicker/js/bootstrap-datepicker.min.js')}}" ></script>

<script>
$('.datepicker').datepicker({
  autoclose: true,
  showOtherMonths: true,
  selectOtherMonths: true,
  format: "dd-mm-yyyy",
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
@endsection
