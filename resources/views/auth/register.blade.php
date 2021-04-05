@extends('layouts.app')
@section('title')
Création compte
@endsection

@section('content')
<div class="login-box">
    <div class="login-box-body">
        <div class="login-logo"><img  src="{{ URL::asset('img/logo2.png') }}" alt="logo Netnoh"></div>

        <center><h4>Vous êtes un(une) :</h4></center>

        <div class="row">
            <center><button type="button" class="btn-lg btn-success" data-toggle="modal" data-target="#modal-success">
                Particulier
            </button></center>
        </div>
        <ln></ln>
        <div class="row">
            <center><button type="button" class="btn-lg btn-danger" data-toggle="modal" data-target="#modal-danger">
                Entreprise
            </button></center>
        </div>

        <!-- auth-link -->
        <center>Vous avez déjà un compte?
            <b><a class="btn btn-link" href="{{ route('login') }}">Connexion.</a></b>
        </center>

    </div>

    <!-- <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
            <button type="button" class="btn btn-block btn-success col-xs-4" data-toggle="modal" data-target="#modal-success">
                <i class="fa fa-plus-circle"></i> Ajouter
            </button>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->

    <!-- /.box -->
    <div class="modal modal-default fade" id="modal-success">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Création compte <b>Particulier</b></h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/admin/membre/create">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nom<i style="color:#FF0000">*</i> :</label>

                            <input type="text" name="firstname" class="form-control" placeholder="Entrer le nom" required>
                        </div>
                        <div class="form-group">
                            <label>Prénom :</label>

                            <input type="text" name="lastname" class="form-control" placeholder="Entrer le prenom">
                        </div>
                        <div class="form-group">
                            <label>Téléphone<i style="color:#FF0000">*</i> :</label>

                            <input type="tel" name="email" class="form-control" placeholder="Numéro de téléphone" required>
                        </div>
                        <div class="form-group">
                            <label>E-mail :</label>

                            <input type="email" name="phone" class="form-control" placeholder="Entrer l'E-mail">
                        </div>

                        <div class="form-group">
                            <label>Mot de passe<i style="color:#FF0000">*</i> :</label>
                            <input type="password" placeholder="Nouveau mot de passe" id="new_password" class="form-control @error('new_password') is-invalid @enderror" name="password" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Confirmer votre Mot de passe<i style="color:#FF0000">*</i> :</label>
                            <input id="confirm_password" placeholder="Confirmer mot de passe" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required>

                            @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Numéro CNI(ou Passeport)<i style="color:#FF0000">*</i> :</label>

                            <input type="number" name="CNI_number" class="form-control" placeholder="Entrer le numéro CNI" required>
                        </div>
                        <div class="form-group">
                            <label>Date de délivrance<i style="color:#FF0000">*</i> :</label>

                            <input type="date" name="CNI_date" class="form-control" placeholder="Entrer la date" required>
                        </div>
                        <div class="form-group">
                            <label>Lieu de délivrance<i style="color:#FF0000">*</i> :</label>

                            <input type="text" name="CNI_place" class="form-control" placeholder="Entrer le lieu" required>
                        </div>
                        <div class="form-group">
                            <label>Votre activité<i style="color:#FF0000">*</i> :</label>

                            <input type="text" name="job" class="form-control" placeholder="Entrer votre activité" required>
                        </div>
                        <div class="form-group">
                            <label>Nom complet :</label>

                            <input type="text" name="toContact_name" class="form-control" placeholder="Entrer le nom">
                        </div>
                        <div class="form-group">
                            <label>Téléphone :</label>

                            <input type="tel" name="toContact_phone" class="form-control" placeholder="Entrer le numéro">
                        </div>
                        
                        <div class="form-group">
                            <i style="color:#FF0000">*</i> Champs obligatoires
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" required>
                            En cochant cette case, j'accepte les <a>Termes et Conditions de Netnoh Finance</a>.</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- /.box -->
    <div class="modal modal-default fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Création compte <b>Enteprise</b></h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/admin/membre/create_ent">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Raison sociale<i style="color:#FF0000">*</i> :</label>

                            <input type="text" name="raison_sociale" class="form-control" placeholder="Entrer votre raison sociale" required>
                        </div>
                        <div class="form-group">
                            <label>Forme juridique<i style="color:#FF0000">*</i> :</label>

                            <input type="text" name="forme_juridique" class="form-control" placeholder="Entrer votre forme juridique" required>
                        </div>
                        <div class="form-group">
                            <label>Téléphone<i style="color:#FF0000">*</i> :</label>

                            <input type="tel" name="email" class="form-control" placeholder="Numéro de téléphone" required>
                        </div>
                        <div class="form-group">
                            <label>E-mail<i style="color:#FF0000">*</i> :</label>

                            <input type="email" name="phone" class="form-control" placeholder="Entrer l'E-mail" required>
                        </div>

                        <div class="form-group">
                            <label>Mot de passe<i style="color:#FF0000">*</i> :</label>
                            <input type="password" placeholder="Nouveau mot de passe" id="new_password" class="form-control @error('new_password') is-invalid @enderror" name="password" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Confirmer votre Mot de passe<i style="color:#FF0000">*</i> :</label>
                            <input id="confirm_password" placeholder="Confirmer mot de passe" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required>

                            @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Numéro contribuable<i style="color:#FF0000">*</i> :</label>

                            <input type="number" name="num_contribuable" class="form-control" placeholder="Entrer votre numéro de contribuable" required>
                        </div>
                        <div class="form-group">
                            <label>Date de délivrance<i style="color:#FF0000">*</i> :</label>

                            <input type="date" name="NC_date" class="form-control" placeholder="Entrer la date" required>
                        </div>
                        <div class="form-group">
                            <label>Siège de l'entreprise<i style="color:#FF0000">*</i> :</label>

                            <input type="text" name="siège" class="form-control" placeholder="Entrer le lieu" required>
                        </div>
                        <div class="form-group">
                            <label>Votre secteur d'activité<i style="color:#FF0000">*</i> :</label>

                            <input type="text" name="activité" class="form-control" placeholder="Entrer votre activité" required>
                        </div>
                        <div class="form-group">
                            <label>Site internet :</label>

                            <input type="text" name="siteWeb" class="form-control" placeholder="Entrer votre siteweb">
                        </div>

                        <div class="form-group">
                            <i style="color:#FF0000">*</i> Champs obligatoires
                        </div>
                        
                        <div class="checkbox">
                            <label><input type="checkbox" required>
                            En cochant cette case, j'accepte les <a>Termes et Conditions de Netnoh Finance</a>.</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</div>
@endsection
