
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="theme-color" content="#ffffff"/>
    <!--- SEO -->

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    <meta name="author" content="EX-School Official">
    <meta name="robots" content="index, follow" />
    <meta name="publisher" content="Hamba Allah - Website ini dilindungi Allah SWT" />
    <meta name="google-site-verification" content="e-XrDEWlCcr4twwW_ncYKKxYCZ8Mwmne2BZpEsod_Kg" />
    <meta property="language" content="Indonesia" />
    <meta property="webcrawlers" content="all" />
    <meta property="rating" content="general" />
    <meta property="spiders" content="all" />

    <link rel="alternate" href="https://ex-school.com/" hreflang="en" />
    <link rel="alternate" href="https://ex-school.com/" hreflang="id" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">


    <!-- Dependency -->
    <link rel="stylesheet" href="{{asset('assets/dropify-master/dist/css/dropify.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/sweetalert/sweetalert2.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!--<link href="{{ asset('/dist/css/bootstrap.min.css')}}" rel="stylesheet">-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!--<script src='https://www.google.com/recaptcha/api.js'></script>-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134149778-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-134149778-1');
    </script>


    <!-- Iklan Google -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-8112897684014622",
        enable_page_level_ads: true
      });
    </script>

    @yield('css')
    <style>
    .swal-overlay {
      background-color: rgba(43, 165, 137, 0.45);
    }
    .swal-text {
      background-color: #FEFAE3;
      padding: 17px;
      border: 1px solid #F0E1A1;
      display: block;
      margin: 22px;
      text-align: center;
      color: #61534e;
    }
    </style>
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('gambar/logo.png') }}" class="logo"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="{{ url('article') }}">Artikel</a></li>
            <li><a href="{{ url('event') }}" >Event</a></li>
            <!-- <li><a href="/video" class="icon-pas"><i class="fa fa-play"></i>   Video</a></li> -->
            {{-- <li><a href="/forums" class="dojo-icon"><i class="fa fa-comments" aria-hidden="true"></i>  Forum</a></li> --}}
            <li><a href="{{ url('category/kepemimpinan-atau-leadership') }}">Kepemimpinan</a> </li>
            <li><a href="{{ url('category/tipsdantrik') }}">Tips & Trik</a> </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">



            @if (Auth::guest())
                <li class="nav-btn"><a href="{{ route('login') }}"><span class="btn-daftar">  Upload Event</span></a></li>
                {{-- <li class="nav-btn"><a href="{{ route('register') }}" ><span class="btn-daftar"><i class="fa fa-user-circle-o"></i>  Daftar</span></a></li> --}}
            @else
                <li>
                <div class="padding8">
                    <a href="{{ url('dashboard/create-article') }}" class="btn btn-block btn-artikel btn-xl"><i class="fa fa-pencil-square margin-xs-right"></i> Tulis Artikel</a>
                </div>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px; color:#07c;">
                      <img src="{{ asset('storage/'.Auth::user()->avatar) }}" style="width:32px; height:32px; position:absolute; top:16px; left:10px; border-radius:50%; border:1px solid #07c;">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('dashboard/profile') }}" class="icon-pas"></i> Profile</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="icon-pas">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

      @yield('content')
    <footer>
      <div class="container">
        <div class="col-md-2 text-center">
          <img src="{{ url('gambar/logox.png') }}" alt="" style="margin:auto; width: 130px; height: 100px;margin-top:30%;">
        </div>
        <div class="col-md-6" style="border-left:1px solid #d9d9d9;">
          <h3>TENTANG EX-SCHOOL</h3>
          <hr/>
          <p style="text-align:justify;">
            EX-SCHOOL adalah Sebuah Media Edukasi, Informasi dan Partnership Sekolah
            yang bertujuan untuk membangun SDM generasi muda yang berwawasan luas dan membantu anak sekolah dalam
            menginformasikan kegiatan atau event disekolahnya.
          </p>
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h3>Follow Kami</h3>
            <b><a href="https://www.instagram.com/exschool_com/"><img src="{{ url('gambar/icon/ig.jpg') }}" alt="" width="40" height="40"></a> </b>
            <b><a href="https://www.facebook.com/exschoolcom/"><img src="{{ url('gambar/icon/fb.jpg') }}" alt="" width="40" height="40"></a> </b>
            <b><a href="http://line.me/ti/p/%40djp1712p"><img src="{{ url('gambar/icon/line.jpg') }}" alt="" width="40" height="40"></a> </b>
            <b><a href="https://twitter.com/exschoolcom"><img src="{{ url('gambar/icon/twiter.jpg') }}" alt="" width="40" height="40"></a> </b>
            <br>

        </div>
    </div>

    </footer>
    <div class="container-fluid">
      <div class="row">
      <div class="bg-footer">
        <div class="container">
          <div class="col-md-4" style="padding: 16px;">
            <h5>Copyright &copy; 2018 <a href="/" class="link">EX-School</a>. All right reserved</h5>
          </div>
          <div class="col-md-6 col-md-offset-2" style="padding: 16px;">
            <h5>
            <ul class="nav-link">
              <li><a href="{{ url('about') }}" class="link navbar-link">About</a></li>
              <li><a href="{{ url('contact') }}" class="link navbar-link">Contact Us</a></li>
              <li><a href="{{ url('layanan-jasa') }}" class="link navbar-link">Layanan Jasa</a></li>
            </ul>
            </h5>
          </div>
        </div>
      </div>
    </div>
    </div>


     <!-- Javascript -->
    <script src="{{ asset('/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/js/main.js')}}"></script>
    <script src="{{ asset('/js/jquery.cookie.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/sweetalert/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/dropify-master/dist/js/dropify.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/datepicker/js/bootstrap-datepicker.min.js')}}" ></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="{{ asset('/dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
    <script src="../vendor/tcg/voyager/assets/lib/js/tinymce/tinymce.min.js"></script>
    <script src="../vendor/tcg/voyager/assets/js/voyager_tinymce.js"></script>

    @yield('js')

    <script>
    $(function(){
      @if(\Illuminate\Support\Facades\Session::has('message'))
			swal({
				icon: '{{ \Illuminate\Support\Facades\Session::get('message_type') }}',
				text: '{{ \Illuminate\Support\Facades\Session::get('message') }}',
				buttons: {
          confirm :true,
        },
			});
		@endif
    });
    
    $('.datepicker').datepicker({
			autoclose: true,
			showOtherMonths: true,
			selectOtherMonths: true,
			format: "dd-mm-yyyy",
		});
    </script>

  </body>
</html>
