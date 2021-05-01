@extends('layout')

@section('title')
    Marchand-Clients
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/multi-step-modal.css') }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestion de mes Clients: Entreprises
        </h1>
        <ol class="breadcrumb">
            <li><a href="/accueil"><i class="fa fa-home"></i> Accueil</a> > Clients(Entreprises)</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @if (count($errors))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fa fa-check"></i> {{ $errors }}</h5>
                </div>
                @endif
            </div>

            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title col-xs-6">Mes Clients: Entreprise</h3>
                        <div class="pull-right box-tools">
                            <button type="button" id='modal-ent' class="btn btn-block btn-success col-xs-4" data-toggle="modal" data-target="#modal-danger8"><i class="fa fa-plus-circle"></i> Ajouter</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-info">
                                    <th>Statut</th>
                                    <th>Raison sociale</th>
                                    <th>Téléphone</th>
                                    <th>Date d'adhésion</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td><center>
                                        @if( $user->is_deleted == 0)
                                            <small class="label bg-green">Active</small>
                                        @else
                                            <small class="label bg-red">En attente</small>
                                        @endif</center>
                                    </td>
                                    <td>{{$user->Raison_sociale}}</td>
                                    <td>{{$user->email}}</td>
                                    <td> <strong> {{$user->created_at->toFormattedDateString()}} </strong><br/>
                                        {{$user->created_at->diffForHumans()}}
                                    </td>

                                    <td>
                                        <center>
                                            <button type="button" data-toggle="modal" data-target="#modal-danger1" data-id="{{$user->id}}" data-name="{{$user->Raison_sociale}}" data-url="/marchand/client_ent/activer/" class="activer1 btn btn-xs btn-success">Activer</button>
                                        </center>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                            </tfoot>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="modal modal-default fade" id="modal-danger1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4>Activation du client : <b class="item"></b></h4>
                            </div>

                            <div class="modal-body">
                                <form class='form-horizontal' id="activer-form1" method="POST" action="">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Raison sociale :</label>

                                        <div class='col-sm-8'><input type="text" id="RS" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Forme juridique :</label>

                                        <div class='col-sm-8'><input type="text" id="FJ" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Téléphone :</label>

                                        <div class='col-sm-8'><input type="tel" id="email" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>E-mail :</label>

                                        <div class='col-sm-8'><input type="email" id="phone" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Date d'adhésion :</label>

                                        <div class='col-sm-8'><input type="text" id="date" class="form-control pull-right" disabled></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Numéro contribuable :</label>

                                        <div class='col-sm-8'><input type="number" id="NC" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Date de délivrance :</label>

                                        <div class='col-sm-8'><input type="text" id="dateNC" class="form-control pull-right" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Siège :</label>

                                        <div class='col-sm-8'><input type="text" id="siège" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Activité :</label>

                                        <div class='col-sm-8'><input type="text" id="activité" class="form-control" disabled></div>
                                    </div>
                                    <br>
                                    <center><b>Responsable de l'entreprise</b></center>
                                    <hr>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Nom :</label>

                                        <div class='col-sm-8'><input type="text" id="name" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Téléphone :</label>

                                        <div class='col-sm-8'><input type="tel" id="email1" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>E-mail :</label>

                                        <div class='col-sm-8'><input type="email" id="phone1" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Numéro CNI :</label>

                                        <div class='col-sm-8'><input type="number" id="CNI" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Date de délivrance :</label>

                                        <div class='col-sm-8'><input type="text" id="dateCNI" class="form-control pull-right" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Lieu de délivrance :</label>

                                        <div class='col-sm-8'><input type="text" id="placeCNI" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Fonction :</label>

                                        <div class='col-sm-8'><input type="text" id="job" class="form-control" disabled></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-primary" id="answer-delete">Confirmer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <bb>1</bb>
                                </div>
                                <div class="check fa fa-check">
                                </div>
                            </div>
                            <div class="p-step">
                                <div class="bullet">
                                    <bb>2</bb>
                                </div>
                                <div class="check fa fa-check">
                                </div>
                            </div>
                            <div class="p-step">
                                <div class="bullet">
                                    <bb>3</bb>
                                </div>
                                <div class="check fa fa-check">
                                </div>
                            </div>
                            <div class="p-step">
                                <div class="bullet">
                                    <bb>4</bb>
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

                                <input type="email" name="phone" id="mail" class="form-control phone" placeholder="Entrer l'E-mail">
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

                                <input type="number" name="num_contribuable" class="form-control" placeholder="Entrer votre numéro de contribuable">
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
    </section>
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script src="{{ URL::asset('js/multi-step-modal.js') }}"></script>
@endsection