@extends('master')

<!-- Main Content -->
@section('content')
<section class="content-wrapper">
    <div class="container top96">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="auth-wrapper">
                    <div class="auth-logo">
                        <a href="/"><img alt="EX - School" src="../gambar/logo.png" class="img-responsive"></a>
                    </div>
                    <h3>Reset Password</h3>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="form-field">
                                <label for="email">Email</label>
                                <input type="email" class="form-control input" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-button">
                            <input type="submit" value="Kirim Ulang Password" class="btn btn-log btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
