
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="EX School" content="">
    <link rel="icon" href="../gambar/logokecil.png">

    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/dist/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('/assets/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">

    <!-- Custom styles for this template -->
    <!-- Theme CSS -->
    <link href="{{ asset('/css/creative.min.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('/assets/js/ie-emulation-modes-warning.js')}}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">


    @yield('css')
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
          <a class="navbar-brand" href="/"><img src="/../gambar/logoex.png" ></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
          <li><a href="{{ url('article')}}" class="dojo-icon"><i class="fa fa-map-o"></i>  Artikel</a></li>
            <li><a href="/event" class="dojo-icon"><i class="fa fa-map-o"></i>  Event</a></li>
            <li><a href="/video" class="icon-pas"><i class="fa fa-play"></i>   Video</a></li>

            <li><a href="/forums" class="dojo-icon"><i class="fa fa-comments" aria-hidden="true"></i>  Forum</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">



            @if (Auth::guest())
                <li><a href="{{ route('login') }}"><span class="btn-login"><i class="fa fa-lock"></i>  Login</span></a></li>
                <li><a href="{{ route('register') }}" ><span class="btn-daftar"><i class="fa fa-user-circle-o"></i>  Daftar</span></a></li>
            @else
                <li>
                <div class="padding8">
                    <a href="/dashboard/create-article" class="btn btn-block btn-artikel btn-xl"><i class="fa fa-pencil-square margin-xs-right"></i> Tulis Artikel</a>
                </div>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px; color:#07c;">
                      <img src="/avatar/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%;">
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
      <footer>
        <div class="container">
          <div class="col-md-2 text-center">
            <img data-original="{{ url('gambar/logox.png') }}" alt="" style="margin:auto; width: 130px; height: 100px;margin-top:30%;">
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
              <b><a href="https://www.instagram.com/exschool_com/"><img data-original="{{ url('gambar/icon/ig.jpg') }}" alt="" width="40" height="40"></a> </b>
              <b><a href="https://www.facebook.com/exschoolcom/"><img data-original="{{ url('gambar/icon/fb.jpg') }}" alt="" width="40" height="40"></a> </b>
              <b><a href="http://line.me/ti/p/%40djp1712p"><img data-original="{{ url('gambar/icon/line.jpg') }}" alt="" width="40" height="40"></a> </b>
              <b><a href="https://twitter.com/exschoolcom"><img data-original="{{ url('gambar/icon/twiter.jpg') }}" alt="" width="40" height="40"></a> </b>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="{{ asset('/dist/js/bootstrap.min.js')}}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('/assets/js/ie10-viewport-bug-workaround.js')}}"></script>

    <!-- Theme JavaScript -->
    @yield('js')
  </body>
</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>

<script src="/vendor/tcg/voyager/assets/lib/js/tinymce/tinymce.min.js"></script>
<script src="/vendor/tcg/voyager/assets/js/voyager_tinymce.js"></script>
