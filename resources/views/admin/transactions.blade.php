@extends('layout')

@section('title')
    Transactions
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transactions :
            <small>Débit & Crédit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Tableau de bord</a></li>
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
                        <h3 class="box-title">Transactions effectuées</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-block btn-success col-xs-4" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus-circle"></i> Ajouter</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr class="bg-info">
                                    <th>N°</th>
                                    <th>Membres</th>
                                    <th>Transaction</th>
                                    <th>Montant</th>
                                    <th>Date transaction</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($trans as $transaction)
                                <tr>

                                    <td>{{$transaction->id}}</td>
                                    @foreach($users as $user)
                                        @if($transaction->UserId == $user->id)
                                            <td>{{$user->fullname}}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <center>
                                            @if( $transaction->Type == "Dépôt")
                                                <small class="label bg-green">Dépôt</small>
                                            @elseif( $transaction->Type == "Retrait")
                                                <small class="label bg-yellow">Retrait</small>
                                            @elseif( $transaction->Type == "Virement")
                                                <small class="label bg-yellow">Virement</small>
                                            @endif
                                        </center>
                                    </td>
                                    <td>{{$transaction->Amount}}</td>
                                    <td> <strong> {{$transaction->created_at->toFormattedDateString()}} </strong></td>
                                    <td>
                                        <center>
                                            <button type="button" data-toggle="modal" data-target="#modal-danger" data-id="{{$transaction->id}}" data-name="{{$transaction->id}}" data-url="/admin/transaction/delete/" title="supprimer" class="delete"><span><i class="fa fa-trash" style="color:red;"></i></span></button>
                                            <button type="button" data-id="{{$transaction->id}}" data-toggle="modal" data-target="#modal-success" title="modifier" class="update"><i class="fa fa-edit" style="color:blue;"> </i></button>
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
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Formulaire d'une Transaction</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/admin/transaction/create" id="transForm">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Membre :</label>

                                    <select class="form-control select2" name="userId" style="width: 100%;">
                                        @foreach($users as $user)
                                            @if($user->is_deleted == 0)
                                                <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Type de transaction :</label>

                                    <select class="form-control select2" name="type" style="width: 100%;">
                                        <option value="Dépôt">Dépôt</option>
                                        <option value="Retrait">Retrait</option>
                                        <option value="Virement">Virement</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Montant :</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                        <input type="number" class="form-control" name="montant" id="montant">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Date de transaction :</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" name="date" id="datepicker">
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

            <div class="modal modal-default fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h3>Etes-vous sure de vouloir supprimer ?</h3>
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