@extends('master')

@section('title','Paskibra Indonesia')
<style>
.baner{
  position: relative;
  background-position: top center;
  background-attachment: fixed;
  background-image: url('../gambar/1.jpg');
  width:100%;
  height: 400px;
}

.wrapper {
  margin-top:160px;
  color: #fff;
}
.kotak-a{
  height: 300px;
  background-color: rgb(31, 120, 244);
  color:#fff;
}
.kotak-b{
  height: 300px;
  background-color: rgb(117, 196, 49);
  color:#fff;
}
.kotak-c{
  height: 300px;
  background-color: rgb(232, 9, 9);
  color:#fff;
}
.kotak-i{
  margin-top:90px;
}
.lambang{
  margin-left: 140px;
}
</style>
@section('content')
  <div class="baner text-center">
    <div class="container">
      <div class="wrapper">
        <h1 class="text-center">Selamat Datang di Paskibra Indonesia</h1>
      </div>
    </div>
  </div>
    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Sejarah Paskibra Indonesia</h2>
                    <hr class="light">
                    <p class="text-faded">Pada hari Jum’at Legi di bulan puasa, tanggal 17 Agustus 1945, pukul 10.00, naskah proklamasi dibacakan oleh Soekarno. Bendera Merah Putih dikibarkan dan lagu Indonesia Raya dinyanyikan. Sebanyak 10 juta bendera Merah Putih kemudian disebar keseluruh penjuru tanah air. </p>
                    <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Halaman kami</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-comments fa-5x text-primary sr-icons"></i>
                        <h3>Forum Paskibra</h3>
                        <p class="text-muted">Diskusilah agar ke tidak tahuan kalian terjawab!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-book fa-5x text-primary sr-icons"></i>
                        <h3>Artikel Paskibra</h3>
                        <p class="text-muted">Mari cari pengetahuan yang lebih luas tentang Paskibra !</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-youtube fa-5x text-primary sr-icons"></i>
                        <h3>Video Paskibra</h3>
                        <p class="text-muted">Pengen lihat aksi keren dari Paskibra Indonesia?</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-map-o fa-5x text-primary sr-icons"></i>
                        <h3>Mading</h3>
                        <p class="text-muted">Ingin melihat informasi Paskibra yang up to date? </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="col-xs-4 col-md-offset-4 iklan" style="border:1px solid #000;">

    </div>
    <div style="clear:both;"></div>
    <div class="container">
      <h3 style="border-bottom:1px solid #eee;">Artikel Terbaru</h3>

      </div>
@endsection
