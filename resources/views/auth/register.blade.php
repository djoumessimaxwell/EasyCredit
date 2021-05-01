@extends('layouts.app')
@section('title')
Création compte
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/multi-step-modal.css') }}">
@endsection

@section('content')
<div class="login-box">
    <div class="login-box-body">
        <div class="login-logo"><img class="logo-width" src="{{ URL::asset('img/logo2.png') }}" alt="logo Netnoh"></div>

        <center><h4>Vous êtes un(une) :</h4></center>

        <div class="row">
            <center><button type="button" id='modal-part' class="btn-lg btn-success" data-toggle="modal" data-target="#modal-danger4">
                Particulier
            </button></center>
        </div>
        <ln></ln>
        <div class="row">
            <center><button type="button" id='modal-ent' class="btn-lg btn-danger" data-toggle="modal" data-target="#modal-danger8">
                Entreprise
            </button></center>
        </div>

        <!-- auth-link -->
        <center>Vous avez déjà un compte?
            <b><a class="btn btn-link" href="{{ route('login') }}">Connexion.</a></b>
        </center>

    </div>

    <!-- /.box -->
    <form method="POST" action="/membrePart/create" class="modal multi-step" id="modal-danger4" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Création compte <b>Particulier</b></h4>
                </div>
                <div class="m-progress-bar">
                    <div class="p-step">
                        <div class="bullet">
                            <b>1</b>
                        </div>
                        <div class="check fa fa-check">
                        </div>
                    </div>
                    <div class="p-step">
                        <div class="bullet">
                            <b>2</b>
                        </div>
                        <div class="check fa fa-check">
                        </div>
                    </div>
                    <div class="p-step">
                        <div class="bullet">
                            <b>3</b>
                        </div>
                        <div class="check fa fa-check">
                        </div>
                    </div>
                    <div class="p-step">
                        <div class="bullet">
                            <b>4</b>
                        </div>
                        <div class="check fa fa-check">
                        </div>
                    </div>
                </div>
                <div class="modal-body step-1 m1">
                    <center><h4>Informations Personnelles</h4></center>
                    <div class="form-group">
                        <label>Nom<i style="color:#FF0000">*</i> :</label>

                        <input type="text" name="firstname" class="form-control" placeholder="Entrer le nom">
                        <div class='alert-danger firstname_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Prénom :</label>

                        <input type="text" name="lastname" class="form-control" placeholder="Entrer le prenom">
                    </div>
                    <div class="form-group">
                        <label>Téléphone<i style="color:#FF0000">*</i> :</label>

                        <input type="tel" name="email" class="form-control" placeholder="6xxxxxxxx">
                        <div class='alert-danger email_error'></div>
                    </div>
                    <div class="form-group">
                        <label>E-mail :</label>

                        <input type="email" name="phone" id="mail" class="form-control" placeholder="Entrer l'E-mail">
                        <div class='alert-danger phone_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Votre activité<i style="color:#FF0000">*</i> :</label>

                        <input type="text" name="job" class="form-control" placeholder="Entrer votre activité">
                        <div class='alert-danger job_error'></div>
                    </div>
                    <div class="form-group">
                        <i style="color:#FF0000">*</i> Champs obligatoires
                    </div>
                </div>

                <div class="modal-body step-2 m2">
                    <center><h4>Pièce d'identité</h4></center>
                    <div class="form-group">
                        <label>Numéro CNI(ou Passeport)<i style="color:#FF0000">*</i> :</label>

                        <input type="number" name="CNI_number" class="form-control" placeholder="Entrer le numéro CNI">
                        <div class='alert-danger CNI_number_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Date de délivrance<i style="color:#FF0000">*</i> :</label>

                        <input type="date" name="CNI_date" class="form-control" placeholder="Entrer la date">
                        <div class='alert-danger CNI_date_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Lieu de délivrance<i style="color:#FF0000">*</i> :</label>

                        <input type="text" name="CNI_place" class="form-control" placeholder="Entrer le lieu">
                        <div class='alert-danger CNI_place_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Votre photo :</label>

                        <input type='file' accept="image/*" name="photo" class="form-control" placeholder="image portrait">
                    </div>
                    <div class="form-group">
                        <i style="color:#FF0000">*</i> Champs obligatoires
                    </div>
                </div>

                <div class="modal-body step-3 m3">
                    <center><h4>Personne à contacter</h4></center>
                    <div class="form-group">
                        <label>Nom complet :</label>

                        <input type="text" name="toContact_name" class="form-control" placeholder="Entrer le nom">
                    </div>
                    <div class="form-group">
                        <label>Téléphone :</label>

                        <input type="tel" name="toContact_phone" class="form-control" placeholder="Entrer le numéro">
                        <div class='alert-danger toContact_error'></div>
                    </div>
                    <div class="form-group">
                        <i style="color:#FF0000">*</i> Champs obligatoires
                    </div>
                </div> 

                <div class="modal-body step-4 m4">
                    <center><h4>Sécurité</h4></center>
                    <div class="form-group">
                        <label>Mot de passe<i style="color:#FF0000">*</i> :</label>
                        <input type="password" placeholder="Mot de passe" id="password" class="form-control" name="password">
                        <div class='alert-danger password_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Confirmer votre Mot de passe<i style="color:#FF0000">*</i> :</label>
                        <input id="confirm_password" placeholder="Confirmer mot de passe" type="password" class="form-control" name="confirm_password">
                        <div class='alert-danger confirm_password_error'></div>
                    </div>
                    <div class="form-group">
                        <i style="color:#FF0000">*</i> Champs obligatoires
                    </div>
                    <div class="checkbox">
                        <label><input name='checkbox' type="checkbox" value="1">
                        En cochant cette case, j'accepte les <a>Termes et Conditions de Netnoh Finance</a>.</label>
                        <div class='alert-danger checkbox_error'></div>
                    </div> 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary step1 pull-left">Retour</button>
                    <button type="button" class="btn btn-primary step2" data-step="1" data-id="1">Suivant</button>
                    <button type="button" class="btn btn-primary step3 pull-left">Retour</button>
                    <button type="button" class="btn btn-primary step4" data-step="1" data-id="2">Suivant</button>
                    <button type="button" class="btn btn-primary step5 pull-left">Retour</button>
                    <button type="button" class="btn btn-primary step6" data-step="1" data-id="3">Suivant</button>
                    <button type="submit" class="btn btn-primary step7" data-step="1" data-id="4">Valider</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
    <!-- /.modal -->

    <!-- /.box -->
    <form method="POST" action="/membreEnt/create" class="modal multi-step" id="modal-danger8" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Création compte <b>Enteprise</b></h4>
                </div>
                <div class="m-progress-bar">
                    <div class="p-step">
                        <div class="bullet1">
                            <b>1</b>
                        </div>
                        <div class="check1 fa fa-check">
                        </div>
                    </div>
                    <div class="p-step">
                        <div class="bullet1">
                            <b>2</b>
                        </div>
                        <div class="check1 fa fa-check">
                        </div>
                    </div>
                    <div class="p-step">
                        <div class="bullet1">
                            <b>3</b>
                        </div>
                        <div class="check1 fa fa-check">
                        </div>
                    </div>
                    <div class="p-step">
                        <div class="bullet1">
                            <b>4</b>
                        </div>
                        <div class="check1 fa fa-check">
                        </div>
                    </div>
                </div>
                <div class="modal-body step-1 m5">
                    <center><h4>Détails de l'entreprise</h4></center>
                    <div class="form-group">
                        <label>Raison sociale<i style="color:#FF0000">*</i> :</label>

                        <input type="text" name="raison_sociale" class="form-control" placeholder="Entrer votre raison sociale">
                        <div class='alert-danger raison_sociale_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Forme juridique<i style="color:#FF0000">*</i> :</label>

                        <input type="text" name="forme_juridique" class="form-control" placeholder="Entrer votre forme juridique">
                        <div class='alert-danger forme_juridique_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Téléphone<i style="color:#FF0000">*</i> :</label>

                        <input type="tel" name="email1" class="form-control" placeholder="6xxxxxxxx">
                        <div class='alert-danger email1_error'></div>
                    </div>
                    <div class="form-group">
                        <label>E-mail :</label>

                        <input type="email" name="phone1" class="form-control" placeholder="Entrer l'E-mail">
                        <div class='alert-danger phone1_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Site internet :</label>

                        <input type="text" name="siteWeb" class="form-control" placeholder="Entrer votre siteweb">
                        <div class='alert-danger siteWeb_error'></div>
                    </div>
                    <div class="form-group">
                        <i style="color:#FF0000">*</i> Champs obligatoires
                    </div>
                </div>

                <div class="modal-body step-2 m6">
                    <center><h4>Identification de l'entreprise</h4></center>
                    <div class="form-group">
                        <label>Numéro contribuable<i style="color:#FF0000">*</i> :</label>

                        <input type="text" name="num_contribuable" class="form-control" placeholder="Entrer votre numéro de contribuable">
                        <div class='alert-danger num_contribuable_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Date de délivrance<i style="color:#FF0000">*</i> :</label>

                        <input type="date" name="NC_date" class="form-control" placeholder="Entrer la date">
                        <div class='alert-danger NC_date_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Siège de l'entreprise<i style="color:#FF0000">*</i> :</label>

                        <input type="text" name="siège" class="form-control" placeholder="Entrer le lieu">
                        <div class='alert-danger siège_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Secteur d'activité<i style="color:#FF0000">*</i> :</label>

                        <input type="text" name="activité" class="form-control" placeholder="Entrer votre activité">
                        <div class='alert-danger activité_error'></div>
                    </div>
                    <div class="form-group">
                        <i style="color:#FF0000">*</i> Champs obligatoires
                    </div>
                </div>

                <div class="form-horizontal modal-body step-3 m7">
                    <center><h4>Responsable de l'Entreprise</h4></center>
                    <div class="form-group">
                        <label class='col-sm-4 control-label'>Nom complet<i style="color:#FF0000">*</i> :</label>

                        <div class='col-sm-8'><input type="text" name="name" class="form-control" placeholder="Votre nom">
                        <div class='alert-danger name_error'></div></div>
                    </div>
                    <div class="form-group">
                        <label class='col-sm-4 control-label'>Téléphone<i style="color:#FF0000">*</i> :</label>

                        <div class='col-sm-8'><input type="tel" name="email2" class="form-control" placeholder="6xxxxxxxx">
                        <div class='alert-danger email2_error'></div></div>
                    </div>
                    <div class="form-group">
                        <label class='col-sm-4 control-label'>E-mail :</label>

                        <div class='col-sm-8'><input type="email" name="phone2" class="form-control" placeholder="Votre email">
                        <div class='alert-danger phone2_error'></div></div>
                    </div>
                    <div class="form-group">
                        <label class='col-sm-4 control-label'>Numéro CNI<i style="color:#FF0000">*</i> :</label>

                        <div class='col-sm-8'><input type="number" name="CNI_number" class="form-control" placeholder="Numéro CNI">
                        <div class='alert-danger CNI_number_error'></div></div>
                    </div>
                    <div class="form-group">
                        <label class='col-sm-4 control-label'>Date de délivrance<i style="color:#FF0000">*</i> :</label>

                        <div class='col-sm-8'><input type="date" name="CNI_date" class="form-control pull-right" placeholder="Date">
                        <div class='alert-danger CNI_date_error'></div></div>
                    </div>
                    <div class="form-group">
                        <label class='col-sm-4 control-label'>Lieu de délivrance<i style="color:#FF0000">*</i> :</label>

                        <div class='col-sm-8'><input type="text" name="CNI_place" class="form-control" placeholder="Lieu">
                        <div class='alert-danger CNI_place_error'></div></div>
                    </div>
                    <div class="form-group">
                        <label class='col-sm-4 control-label'>Votre photo :</label>

                        <div class='col-sm-8'><input type='file' accept="image/*" name="photo" class="form-control" placeholder="image portrait"></div>
                    </div>
                    <div class="form-group">
                        <label class='col-sm-4 control-label'>Fonction<i style="color:#FF0000">*</i> :</label>

                        <div class='col-sm-8'><input type="text"  name="job" class="form-control" placeholder="Fonction">
                        <div class='alert-danger job_error'></div></div>
                    </div>
                    <div class="form-group">
                        <i style="color:#FF0000; margin-left:20px">*</i> Champs obligatoires
                    </div>
                </div> 

                <div class="modal-body step-4 m8">
                    <center><h4>Sécurité</h4></center>
                    <div class="form-group">
                        <label>Mot de passe<i style="color:#FF0000">*</i> :</label>
                        <input type="password" placeholder="Mot de passe" id="password" class="form-control" name="password">
                        <div class='alert-danger password_error'></div>
                    </div>
                    <div class="form-group">
                        <label>Confirmer votre Mot de passe<i style="color:#FF0000">*</i> :</label>
                        <input id="confirm_password" placeholder="Confirmer mot de passe" type="password" class="form-control" name="confirm_password">
                        <div class='alert-danger confirm_password_error'></div>
                    </div> 
                    <div class="form-group">
                        <i style="color:#FF0000">*</i> Champs obligatoires
                    </div>
                    <div class="checkbox">
                        <label><input name="checkbox" type="checkbox" value="1">
                        En cochant cette case, j'accepte les <a>Termes et Conditions de Netnoh Finance</a>.</label>
                        <div class='alert-danger checkbox_error'></div>
                    </div>
                </div>
                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary step1 pull-left">Retour</button>
                    <button type="button" class="btn btn-primary step2" data-id="5">Suivant</button>
                    <button type="button" class="btn btn-primary step3 pull-left">Retour</button>
                    <button type="button" class="btn btn-primary step4" data-id="6">Suivant</button>
                    <button type="button" class="btn btn-primary step5 pull-left">Retour</button>
                    <button type="button" class="btn btn-primary step6" data-id="7">Suivant</button>
                    <button type="submit" class="btn btn-primary step7" data-id="8">Valider</button>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
    <!-- /.modal -->

</div>
@endsection

@section('script')
<script src="{{ URL::asset('js/multi-step-modal.js') }}"></script>
@endsection