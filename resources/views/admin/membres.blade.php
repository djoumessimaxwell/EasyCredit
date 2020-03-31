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
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr class="bg-info">
                                    <th>Statut</th>
                                    <th>Nom</th>
                                    <th>Téléphone</th>
                                    <th>E-mail</th>
                                    <th>Solde</th>
                                    <th>Date d'adhésion</th>
                                    <th>Role</th>
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
                                            <small class="label bg-red">Exclu</small>
                                        @endif</center>
                                    </td>
                                    <td>{{$user->fullname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    @foreach($soldes as $solde)
                                        @if($solde->UserId == $user->id)
                                            <td> <strong> {{$solde->Solde}} </strong></td>
                                        @endif
                                    @endforeach
                                    <td> <strong> {{$user->created_at->toFormattedDateString()}} </strong><br/>
                                        {{$user->created_at->diffForHumans()}}
                                    </td>

                                    <td><center>
                                        @if( $user->hasRole('Admin'))
                                            <small class="label bg-red">Admin</small>
                                        @elseif( $user->hasRole('Personnel'))
                                            <small class="label bg-green">Personnel</small>
                                        @elseif( $user->hasRole('Membre'))
                                            <small class="label bg-yellow">Membre</small>
                                        @endif</center>
                                    </td>

                                    <td>
                                        <center>
                                            <button type="button" data-toggle="modal" data-target="#modal-danger" data-id="{{$user->id}}" data-name="{{$user->fullname}}" data-url="/admin/membre/delete/" title="supprimer" class="delete"><span><i class="fa fa-trash" style="color:red;"></i></span></button>
                                            <button type="button" data-id="{{$user->id}}" data-toggle="modal" data-target="#modal-success" title="modifier" class="update"><i class="fa fa-edit" style="color:blue;"> </i></button>
                                            <button type="button" class="view" data-toggle="modal" data-target="#modal-info" data-id="{{$user->id}}" data-name="{{$user->fullname}}"><i class="fa fa-eye" style="color:blue;" title="visualiser"> </i></button>
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

                                        <input type="text" name="firstname" class="form-control" placeholder="Entrer le nom">
                                    </div>
                                    <div class="form-group">
                                        <label>Prénom :</label>

                                        <input type="text" name="lastname" class="form-control" placeholder="Entrer le prenom">
                                    </div>
                                    <div class="form-group">
                                        <label>Téléphone :</label>

                                        <input type="tel" name="email" class="form-control" placeholder="Numéro de téléphone" pattern="[0-9]{9}">
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail :</label>

                                        <input type="email" name="phone" class="form-control" placeholder="Entrer l'E-mail">
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

                <div class="modal modal-default fade" id="modal-info">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Toutes les transactions de <small></small></h4>
                            </div>
                            <div class="modal-body">
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
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <div class="modal modal-default fade" id="modal-danger">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3>Etes-vous sure de vouloir désactiver ?</h3>
                                <h4 class="item"><p></p></h4>
                            </div>

                            <div class="modal-footer">
                                <form id="delete-form" method="POST" action="">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary" id="answer-delete">Oui</button>
                                </form>
                            </div>
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
            var url = $(this).data('url');
            $('h4 p').html(Name);
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