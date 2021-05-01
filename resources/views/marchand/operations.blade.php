@extends('layout')

@section('title')
    Marchand-Opérations
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
            Mes Opérations :
            <small>Dépôt, Rétrait & Transfert</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/accueil"><i class="fa fa-home"></i> Accueil</a></li>
        </ol>
    </section>

    <!-- Main content -->
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
                        <h3 class="box-title">Opérations effectuées</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-block btn-success col-xs-4" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus-circle"></i> Nouvelle opération</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-info">
                                    <th>N°</th>
                                    <th>Client</th>
                                    <th>Opération</th>
                                    <th>Montant</th>
                                    <th>Date transaction</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($trans as $trans)
                                <tr>
                                    <td>{{$trans->id}}</td>
                                    @foreach($users as $user)
                                        @if($trans->senderId == $user->id)
                                            <td>{{$user->fullname}}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <center>
                                            @if( $trans->Type == "Dépôt")
                                                <small class="label bg-green">Dépôt</small>
                                            @elseif( $trans->Type == "Retrait")
                                                <small class="label bg-red">Retrait</small>
                                            @elseif( $trans->Type == "Virement")
                                                <small class="label bg-blue">Transfert</small>
                                            @elseif( $trans->Type == "Crédit")
                                                <small class="label bg-yellow">Crédit</small>
                                            @endif
                                        </center>
                                    </td>
                                    <td>{{$trans->Amount}}</td>
                                    <td> <strong> {{$trans->created_at->toFormattedDateString()}} </strong></td>
                                    <td>
                                        <center>
                                            <button type="button" data-toggle="modal" data-target="#modal-danger" data-id="{{$trans->id}}" data-name="{{$trans->id}}" title="visualiser" class="delete"><span><i class="fa fa-eye" style="color:blue;"></i></span></button>
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
            </div>

            <div class="modal modal-default fade" id="modal-success">
                <div class="operation-box">
                    <div class="login-box-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <center><h4>Choix Opération :</h4></center>

                        <div class="row">
                            <center><a href="/marchand/operation/1" class="btn btn-lg btn-success" style="border-radius: 30px">
                                Dépôt
                            </a></center>
                        </div>
                        <div class="row">
                            <center><a href="/marchand/operation/2" class="btn btn-lg btn-danger" style="border-radius: 30px">
                                Retrait
                            </a></center>
                        </div>
                        <div class="row" style="display: none;">
                            <center><a href="/marchand/operation/3" class="btn btn-lg btn-success" style="border-radius: 30px">
                                Transfert
                            </a></center>
                        </div>
                        <div class="row" style="display: none;">
                            <center><a href="/marchand/operation/4" class="btn btn-lg btn-danger" style="border-radius: 30px">
                                Crédit
                            </a></center>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal modal-default fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h3>Opération : </h3>
                            <h4 class="item"><p></p></h4>
                        </div>

                        <div class="modal-footer">
                            <form id="delete-form" method="POST" action="">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Annuler</button>
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
        $(".update").click(function(){
            var id = $(this).data('id');
            $.ajax({
                method: "get",
                url: "/admin/transactions/edit/" + id,
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    $('#userId').val(response.userId);
                    $('#type').val(response.type);
                    $('#montant').val(response.montant);
                    $('#date').val(response.date);
                },
                error: function(error){
                    console.log(error);
                }
            });
        });

        $(".delete").click(function(){
            var id = $(this).data('id');
            var Name = $(this).data('name');
            var Numero = $(this).data('name');
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
          'scrollX'     : true,
          'autoWidth'   : false})
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