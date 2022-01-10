@extends('master')
<title>Login Media Partner</title>
@section('css')
<style media="screen">
  body{background: #189cfa;}
  .font-tebal{font-weight: bold; color: #fff; font-family: arial; letter-spacing: 1px;}
  .font-putih {color: #fff;}
  .checkbox-label{margin-left: 20px;}
</style>
@endsection
@section('content')
<div class="container top64 text-center">
  <div class="padding16">
    <h2 class="font-tebal">SELAMAT DATANG</h2>
    <br>
    <p class="font-putih">Tepat sekali! kamu memilih EX-SCHOOL <br>sebagai Media Partner Event di Sekolah kamu!</p>
    <h4 class="font-putih">Mudah Sekali lho... GRATIS juga ...</h4>
    <br>
    <p class="font-putih">Eeiittss... sebelum Upload Event kamu silakan Login dahulu ya...</p>
    <b class="font-putih">Pastikan kamu mempunyai Akun untuk Login, Jika belum Punya Klik <a href="{{ url('/register')}}">Daftar Akun</a></b>
    <br>
    <br>
    <div class="">
      <div class="col-md-4 col-md-offset-4">
          <div class="auth-wrapper">

              <h2 class="font-putih">Account / Login</h2>
          </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                  {{ csrf_field() }}
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
                  <fieldset>

                          <div class="form-field">
                              <label for="email">Email</label>
                              <input type="email" class="form-control input" name="email" value="{{ old('email') }}" required autofocus>

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-field top32">
                              <label for="pwd">Password</label>
                              <input type="password" class="form-control input" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-field">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>
                            <label for=""> Ingat saya !</label>
                          </div>
                          <br>
                          <div class="form-button">
                              <input type="submit" value="Log In" class="btn btn-log btn-block btn-lg">
                          </div>
                      </fieldset>
              </form>
    </div>
  </div>
  </div>
</div>
<div class="row">
    <div class="text-center">
      <div class="top32">Belum punya akun ?&nbsp;<a href="{{ url('/register')}}" class="font-putih">Klik disini untuk Daftar Akun</a></div>
      <div >Lupa password?&nbsp;<a href="{{ url('/password/reset') }}" class="font-putih">Klik disini untuk Reset</a></div>
    </div>
</div>
<br><br><br>
@endsection
