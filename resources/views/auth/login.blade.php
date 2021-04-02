
@extends('layouts.app')
@section('title')
Authentification
@endsection

@section('content')
<div class="login-box">
    <div class="login-box-body">
        <div class="login-logo"><img  src="{{ URL::asset('img/logo2.png') }}" alt="logo Netnoh"></div>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="tel" placeholder="Téléphone" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="password" placeholder="Mot de passe" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-6 pull-right">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- /.register-links -->
        <h5>Pas encore client?
        <b><a class="nav-lin" href="{{ route('register') }}">Devenir client</a></b></h5>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
