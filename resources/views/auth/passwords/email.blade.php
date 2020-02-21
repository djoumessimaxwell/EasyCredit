@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="/">  <img  src="{{ URL::asset('img/logo2.jpg') }}" alt="logo du CTI"> </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <h4>Modification du Mot de passe</h4>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
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
            </div>

            <div class="row">
                <div class="col-xs-6">
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Envoyer le lien</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
</div>
@endsection
