@extends('layout')

@section('title')
    Membres
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mon Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Tableau de bord</a></li>
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
            <div class="col-xs-6">
                <div class="box box-primary">
                    <div class="tab-content">
                        <div class="active tab-pane box-body box-profile" id="first">
                            <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset('img/user2-160x160.jpg') }}" alt="User profile picture">

                            <h3 class="profile-username text-center">{{ Auth::user()->fullname }}</h3>

                            <p class="text-muted text-center">
                                @if( Auth::user()->hasRole('Admin') )Administrateur
                                @elseif( Auth::user()->hasRole('Member') )Membre
                                @endif
                            </p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Membre depuis</b> <a class="pull-right">{{ Auth::user()->created_at->toFormattedDateString() }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Solde</b> <a class="pull-right">{{ $solde->Solde }} <small>FCFA</small></a>
                                </li>
                            </ul>

                            <a href="#second" data-toggle="tab" class="btn btn-primary btn-block"><b>Modifier mon profile</b></a>
                        </div>

                        <div class="tab-pane box-body" id="second">
                            <div class="box-header with-border">
                                <a href="#first" data-toggle="tab" class="btn fc-button fc-state-default fc-corner-left"><b> < </b></a>
                            </div>
                            <form class="form-horizontal" method="POST" action="/admin/membre/update/{{ Auth::user()->id }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nom</label>

                                    <div class="col-sm-10">
                                        <input type="text" value="{{ Auth::user()->firstname }}" name="firstname" class="form-control" placeholder="Entrer le nom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Prénom</label>

                                    <div class="col-sm-10">
                                        <input type="text" value="{{ Auth::user()->lastname }}" name="lastname" class="form-control" placeholder="Entrer le nom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Téléphone</label>

                                    <div class="col-sm-10">
                                        <input type="tel" value="{{ Auth::user()->email }}" name="email" class="form-control" placeholder="Numéro de téléphone" pattern="[0-9]{9}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" value="{{ Auth::user()->phone }}" name="phone" class="form-control" placeholder="Entrer l'E-mail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="pull-right btn btn-success">Valider</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-xs-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Paramètres d'authentification</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Identifiant</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Mot de Passe</b> <a class="pull-right btn btn-info btn-xs" data-toggle="modal" data-target="#modal-danger">Modifier</a>
                            </li>
                        </ul>
                        
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="modal modal-default fade" id="modal-danger">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Modification du mot de passe</h4>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <div class="form-group has-feedback">
                                        <input type="password" placeholder="Nouveau mot de passe" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group has-feedback">
                                        <input id="password-confirm" placeholder="Confirmer mot de passe" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-success">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
    <script>
        $(function () {
            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })
        })
    </script>

    <script>
      $(function () {
        $(".delete").click(function(){
            var id = $(this).data('id');
            var Name = $(this).data('name');
            var Numero = $(this).data('name');
            var url = $(this).data('url');
            $('.item h4').html(Name);
            $('#delete-form').attr('action', url + id);
        });

        $(".view").click(function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('h4 small').html(name);
        });

        $('#example1').DataTable({
          'scrollX'     : true})
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'scrollX'     : true,
          'autoWidth'   : false
        })
      })
    </script>
@endsection