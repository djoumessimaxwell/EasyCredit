@extends('layouts.app')
@section('title')
    Verify email
@endsection

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="/">  <img  src="{{ URL::asset('img/logo2.jpg') }}" alt="logo du CTI"> </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
            <p class="login-box-msg">Verification de votre email</p>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    Un nouveau lien a été envoyé !
                </div>
            @endif

            Vérifier votre boite mail. Suivez le lien qui vous a été envoyé.
            Si vous n'avez pas reçu de message,
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Renvoyer un lien</button>.
            </form>
        </div>
    </div>
</div>
@endsection
