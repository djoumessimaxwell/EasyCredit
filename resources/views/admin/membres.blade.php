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
            Gestion des Utilisateurs
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Accueil</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title col-xs-6">Liste des membres</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-block btn-success col-xs-4" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus-circle"></i> Ajouter</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-info">
                                    <th>Nom</th>
                                    <th>E-mail</th>
                                    <th>Téléphone</th>
                                    <th>Date d'adhésion</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $user)
                                <tr>

                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td> <strong> {{$user->created_at->toFormattedDateString()}} </strong><br/>
                                        {{$user->created_at->diffForHumans()}}
                                    </td>

                                    <td><center>
                                        @if( $user->hasRole('Admin'))
                                            <small class="label bg-red">Admin</small>
                                        @elseif( $user->hasRole('Staff'))
                                            <small class="label bg-green">Personnel</small>
                                        @elseif( $user->hasRole('Member'))
                                            <small class="label bg-yellow">Membre</small>
                                        @endif</center>
                                    </td>

                                    <td>
                                        <center>
                                            <button type="submit" class="try-delete-user" data-id="{{$user->id}}" data-name="{{$user->ame}}" data-url="/" title="supprimer"><span><i class="fa fa-trash" style="color:red;"></i></span></button>
                                            <button title="modifier"><span><i class="fa fa-edit" style="color:blue;"></i></span></button>
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
                <!-- /.box -->
                <div class="modal modal-default fade" id="modal-success">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Formulaire d'ajout d'un Membre</h4>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/admin/membre/create">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Nom :</label>

                                        <input type="text" name="name" class="form-control" placeholder="Entrer le nom">
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail :</label>

                                        <input type="text" name="email" class="form-control" placeholder="Entrer l'E-mail">
                                    </div>
                                    <div class="form-group">
                                        <label>Téléphone :</label>

                                        <input type="text" name="phone" class="form-control" placeholder="Numéro de téléphone">
                                    </div>
                                    <div class="form-group">
                                        <label>Role :</label>

                                        <select class="form-control select2" name="role" style="width: 100%;">
                                            <option value="3">Membre</option>
                                            <option value="2">Personnel</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date d'adhésion' :</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="date" class="form-control pull-right" id="datepicker">
                                        </div>
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
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
@endsection