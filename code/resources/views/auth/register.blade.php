@extends('master')
@section('title', 'Daftar EX - School')

@section('content')
  <section class="content-wrapper">
    <div class="container top96">
        <div class="row padding8">
            <div class="col-md-4 col-md-offset-4">
                <div class="auth-wrapper">
                    <div class="auth-logo">
                        <a href="/"><img alt="EX - School" src="../gambar/logo.png" class="img-responsive"></a>
                    </div>
                    <h3>Account / Register</h3>
                </div>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
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

                        <div class="form-field{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control input" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email</label>
                            <input type="email" class="form-control input" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-field{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="pwd">Password</label>
                                <input type="password" class="form-control input" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-field">
                            <label for="password-confirm">Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control input" name="password_confirmation" required>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" class="btn btn-log btn-block btn-lg">Daftar</button>
                        </div>

                        <div class="text-center top32">
                            <div class="top32">Lupa password?&nbsp;<a href="{{ url('/password/reset') }}" class="link">Click here to reset</a></div>
                            <div>Sudah punya akun ?&nbsp;<a href="{{ url('/login')}}" class="link">Click here to Log in</a></div>
                        </div>
                    </fieldset>
                </form>
            </div>


        </div>
    </div>
</section>
@endsection
@section('js')
@endsection