<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!--- SEO -->
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <meta name="author" content="Aditya Ardiansyah Owner ex-school">
    <meta name="robots" content="index, follow" />
    <meta name="publisher" content="Hamba Allah - Website ini dilindungi Allah SWT" />
    <meta name="google-site-verification" content="HcEDlM6FCS6YFfqNA2Ggt3H9CHf9AFahCxxBgP8HC6M" />
    <meta property="language" content="Indonesia" />
    <meta property="webcrawlers" content="all" />
    <meta property="rating" content="general" />
    <meta property="spiders" content="all" />

    <link rel="alternate" href="https://ex-school.com/" hreflang="en-us" />
    <link rel="alternate" href="https://ex-school.com/" hreflang="id" />
    <link rel="alternate" href="https://ex-school.com/" hreflang="cn" />

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link href="{{ asset('/css/creative.min.css') }}" rel="stylesheet">

    <script src="{{ asset('/assets/js/ie-emulation-modes-warning.js')}}"></script>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('css')
    <style>

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="/../gambar/logo.png" ></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="/article" class="dojo-icon"><i class="fa fa-map-o"></i>  Artikel</a></li>
            <li><a href="/event" class="dojo-icon"><i class="glyphicon glyphicon-calendar"></i>  Event</a></li>
            <!-- <li><a href="/video" class="icon-pas"><i class="fa fa-play"></i>   Video</a></li> -->

            <!-- <li><a href="/forums" class="dojo-icon"><i class="fa fa-comments" aria-hidden="true"></i>  Forum</a></li> -->
            <li><a href="/category/kepemimpinan-atau-leadership">Kepemimpinan</a> </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">



            @if (Auth::guest())
                <!-- <li><a href="{{ route('login') }}"><span class="btn-login"><i class="fa fa-lock"></i>  Login</span></a></li>
                <li><a href="{{ route('register') }}" ><span class="btn-daftar"><i class="fa fa-user-circle-o"></i>  Daftar</span></a></li> -->
            @else
                <li>
                <div class="padding8">
                    <a href="/dashboard/create-article" class="btn btn-block btn-artikel btn-xl"><i class="fa fa-pencil-square margin-xs-right"></i> Tulis Artikel</a>
                </div>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px; color:#07c;">
                      <img src="/storage/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%;">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/dashboard/profile" class="icon-pas"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="icon-pas">
                            <i class="glyphicon glyphicon-share"></i>
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
    </div>
    <footer>
      <div class="container">
        <div class="col-md-2 text-center">
          <img src="{{ asset('/gambar/logox.png') }}" alt="" style="margin:auto; width: 130px; height: 100px;margin-top:30%;">
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
            <b><a href="https://www.instagram.com/exschool_com/"><img src="{{ asset('/gambar/icon/ig.jpg') }}" alt="" width="40" height="40"></a> </b>
            <b><a href="https://www.facebook.com/exschoolcom/"><img src="{{ asset('/gambar/icon/fb.jpg') }}" alt="" width="40" height="40"></a> </b>
            <b><a href="http://line.me/ti/p/%40djp1712p"><img src="{{ asset('/gambar/icon/line.jpg') }}" alt="" width="40" height="40"></a> </b>
            <b><a href="https://twitter.com/exschoolcom"><img src="{{ asset('/gambar/icon/twiter.jpg') }}" alt="" width="40" height="40"></a> </b>
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
              <!-- <li><a href="{{ url('contact') }}" class="link navbar-link">Contact Us</a></li>
              <li><a href="{{ url('layanan-jasa') }}" class="link navbar-link">Layanan Jasa</a></li> -->
            </ul>
            </h5>
          </div>
        </div>
      </div>
    </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('js')
</body>
</html>
