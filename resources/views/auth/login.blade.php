
@extends('layouts.app')
@section('title')
Login
@endsection

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="/">  <img  src="{{ URL::asset('img/logo2.jpg') }}" alt="logo du CTI"> </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Authentification</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" placeholder="Email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="password" placeholder="Mot de passe" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- /.social-auth-links -->
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Vous avez oublié votre mot de passe?
            </a>
        @endif

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
