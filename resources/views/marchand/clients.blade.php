@extends('layout')

@section('title')
    Marchand-Clients
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestion de mes Clients
        </h1>
        <ol class="breadcrumb">
            <li><a href="/accueil"><i class="fa fa-home"></i> Accueil</a></li>
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
                        <h3 class="box-title col-xs-6">Client à confirmer</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr class="bg-info">
                                    <th>Statut</th>
                                    <th>Nom</th>
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
                                    <td>{{$user->fullname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td> <strong> {{$user->created_at->toFormattedDateString()}} </strong><br/>
                                        {{$user->created_at->diffForHumans()}}
                                    </td>

                                    <td>
                                        <center>
                                            <button type="button" data-toggle="modal" data-target="#modal-danger" data-id="{{$user->id}}" data-name="{{$user->fullname}}" data-url="/admin/membre/delete/" class="delete btn btn-xs btn-success">Activer</button>
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

                <div class="modal modal-default fade" id="modal-danger">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3>Activation du client : <label class="item"></label></h3>
                            </div>

                            <div class="modal-body">
                                <form class='form-horizontal' id="delete-form" method="POST" action="">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Nom :</label>

                                        <div class='col-sm-8'><input type="text" name="firstname" id="firstname" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Téléphone :</label>

                                        <div class='col-sm-8'><input type="tel" name="email" id="email" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>E-mail :</label>

                                        <div class='col-sm-8'><input type="email" name="phone" id="phone" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Date d'adhésion :</label>

                                        <div class='col-sm-8'><input type="text" name="date" id="date" class="form-control pull-right" disabled></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Numéro CNI :</label>

                                        <div class='col-sm-8'><input type="number" name="CNI" id="CNI" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Date de délivrance :</label>

                                        <div class='col-sm-8'><input type="text" name="dateCNI" id="dateCNI" class="form-control pull-right" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Lieu de délivrance :</label>

                                        <div class='col-sm-8'><input type="text" name="placeCNI" id="placeCNI" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Activité :</label>

                                        <div class='col-sm-8'><input type="text"  name="job" id="job" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Nom personne à contacter :</label>

                                        <div class='col-sm-8'><input type="text" name="toContactName" id="toContactName" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class='col-sm-4 control-label'>Numéro de téléphone :</label>

                                        <div class='col-sm-8'><input type="tel" name="toContactPhone" id="toContactPhone" class="form-control" disabled></div>
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
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
    <script>
      $(function () {
        $(".delete").click(function(){
            var id = $(this).data('id');
            var Name = $(this).data('name');
            var url = $(this).data('url');
            $.ajax({
                method: "get",
                url: "/marchand/client/view/" + id,
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    $('#firstname').val(response.name);
                    $('#email').val(response.email);
                    $('#phone').val(response.phone);
                    $('#date').val(response.date);
                    $('#CNI').val(response.CNI);
                    $('#dateCNI').val(response.dateCNI);
                    $('#placeCNI').val(response.placeCNI);
                    $('#job').val(response.job);
                    $('#toContactName').val(response.toContactName);
                    $('#toContactPhone').val(response.toContactPhone);
                },
                error: function(error){
                    console.log(error);
                }
            });
            $('.item').html(Name);
            $('#delete-form').attr('action', url + id);
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