
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="Aditya Ardiansyah" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('/assets/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/devdojo.woff') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/Gotham-Rounded.woff') }}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('/assets/js/ie-emulation-modes-warning.js')}}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('css')
    <style media="screen">
    .navbar-default .navbar-nav>li>a {
        color: #fff;
        transition: all .5s;
        font-weight: bold;
        font-size: 15px;
        -webkit-font-smoothing: subpixel-antialiased;
        letter-spacing: .1px;
    }
    .navbar-default .navbar-nav>li>a:hover{
        color: red;
    }
    .navbar-default .navbar-header>a{
      color:#fff;
      font-weight: bold;

    }
    .navbar-default{
      background-color: #2c3031;
      min-height: 50px;
    }
    .btno{
      border-radius:30px;
      border:2px solid #fff;
    }
    </style>
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Paskibra Indonesia</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/" class="dojo-icon"><i class="fa fa-map-o"></i>  Blog</a></li>
            <li><a href="/forums" class="dojo-icon"><i class="fa fa-comments" aria-hidden="true"></i>  Forum</a></li>


            @if (Auth::guest())
                <li><a href="{{ route('login') }}" class="icon-pas"><i class="fa fa-lock"></i>  Login</a></li>
                <li><a href="{{ route('register') }}" class="icon-pas btno"><i class="fa fa-user-circle-o"></i>  Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                      <img src="/avatar/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%;">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/profile" class="icon-pas"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
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
      @yield('widget')
      <footer>
        <div class="container jarak-fo">
          <div class="col-md-7">
            <p style="font-size:18px;">DAPATKAN ARTIKEL TERBARU DAN ILMU YANG BERMANFAAT</p>

            <form action="//paskibraindonesia.us16.list-manage.com/subscribe/post?u=26fc88a7886c66f7bb0147288&amp;id=d80417619b" method="post" name="mc-embedded-subscribe-form" class="form-inline" target="_blank" novalidate>
              <div class="text-center">
                <input type="email" value="" name="EMAIL" class="form-control" id="mail" placeholder="email address" required>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_26fc88a7886c66f7bb0147288_d80417619b" tabindex="-1" value=""></div>
                <input type="submit" value="Subscribe" name="subscribe" class="tombol"></div>
              </div>
            </form>
          </div>

          <div class="col-md-4 col-md-offset-1" style="">
            <span style="font-size:18px;">Diskusi</span>
            {{ menu('footer') }}

          </div>
        </div>
      </footer>
      <div class="foot">
        <div class="container">
          <div class="col-md-6">
            <a href="www.paskibraindonesia.com" class="foota">&copy; Paskibra Indonesia 2017</a>
          </div>
          <div class="col-md-2 col-md-offset-4">
            <p style="padding:0; margin:0;">Aditya Ardiansyah</p>
          </div>

        </div>
      </div>
     <!-- Javascript -->
    <script src="{{ asset('/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/js/navshrink.js')}}"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="{{ asset('/dist/js/bootstrap.min.js')}}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('/assets/js/ie10-viewport-bug-workaround.js')}}"></script>

    @yield('js')
  </body>
</html>
