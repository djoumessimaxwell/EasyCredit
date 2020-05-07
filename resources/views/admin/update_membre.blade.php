@extends('layout')

@section('title')
    Modification
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Modification du compte de : {{ $user->fullname }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Tableau de bord</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- @if (count($errors))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fa fa-check"></i> {{ $errors }}</h5>
                </div>
                @endif -->
            </div>
            <div class="col-lg-6">
                <div class="box box-success">
                    <div class="tab-content">
                        <div class="active tab-pane box-body box-profile" id="first">
                            <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset('img/user2-160x160.jpg') }}" alt="User profile picture">

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Nom</b> <a class="pull-right"><b>{{ $user->firstname }}</b></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Prénom</b> <a class="pull-right"><b>{{ $user->lastname }}</b></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Téléphone</b> <a class="pull-right"><b>{{ $user->email }}</b></a>
                                </li>
                                <li class="list-group-item">
                                    <b>E-mail</b> <a class="pull-right"><b>{{ $user->phone }}</b></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Rôle</b> <a class="pull-right"><b>
                                        @if( $user->hasRole('Admin') )Administrateur
                                        @elseif( $user->hasRole('Membre') )Membre
                                        @elseif( $user->hasRole('Personnel'))Personnel
                                        @endif
                                    </b></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Membre depuis</b> <a class="pull-right"><b>{{ $user->created_at->toFormattedDateString() }}</b></a>
                                </li>
                            </ul>

                            <a href="#second" data-toggle="tab" class="btn btn-success btn-block"><b>Modifier</b></a>
                        </div>

                        <div class="tab-pane box-body" id="second">
                            <div class="box-header with-border">
                                <a href="#first" data-toggle="tab" class="btn fc-button fc-state-default fc-corner-left"><b> < </b></a>
                            </div>
                            <form class="form-horizontal" method="POST" action="/admin/membre/update/{{ $user->id }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nom</label>

                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $user->firstname }}" name="firstname" class="form-control" placeholder="Entrer le nom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Prénom</label>

                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $user->lastname }}" name="lastname" class="form-control" placeholder="Entrer le prénom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Téléphone</label>

                                    <div class="col-sm-10">
                                        <input type="tel" value="{{ $user->email }}" name="email" class="form-control" placeholder="Numéro de téléphone" pattern="[0-9]{9}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" value="{{ $user->phone }}" name="phone" class="form-control" placeholder="Entrer l'E-mail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Role</label>

                                    <div class="col-sm-7">
                                        <select class="form-control select2" name="role" style="width: 100%;">
                                            <option value="3">Membre</option>
                                            <option value="2">Personnel</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        @if( $user->hasRole('Admin') )Administrateur
                                        @elseif( $user->hasRole('Membre') )Membre
                                        @elseif( $user->hasRole('Personnel'))Personnel
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Date d'adhésion</label>

                                    <div class="col-sm-7">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="date" class="form-control pull-right" id="datepicker">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">{{ $user->created_at->toFormattedDateString() }}</div>
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
            <div class="col-lg-6">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Ses transactions</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Solde</b> <a class="pull-right"><b>{{ $solde->Solde }} <small>FCFA</small></b></a>
                            </li>
                        </ul>
                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            </thead>

                            <tbody>
                                @foreach($trans as $tran)
                                <tr>
                                    <td>
                                    <!-- drag handle -->
                                        <span>
                                            <i class="fa fa-ellipsis-v"></i>
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>
                                        <!-- todo text -->
                                        @if($tran->Type == "Dépôt")
                                            <span class="text"> {{ $tran->created_at->toFormattedDateString() }}  :  Dépôt de {{ $tran->Amount }} FCFA</span>
                                        @elseif($tran->Type == "Retrait")
                                            <span class="text"> {{ $tran->created_at->toFormattedDateString() }}  :  Retrait de {{ $tran->Amount }} FCFA</span>
                                        @elseif($tran->Type == "Virement")
                                            <span class="text"> {{ $tran->created_at->toFormattedDateString() }}  :  Virement de {{ $tran->Amount }} FCFA vers </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                            </tfoot>

                        </table>
                    </div>
                </div>
                <!-- /.box -->
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