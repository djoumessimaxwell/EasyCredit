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
            <li><a href="/"><i class="fa fa-dashboard"></i> Accueil</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
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
                        <table id="example1" class="table table-bordered table-striped">
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
                                            <td>{{$user->name}}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <center>
                                            @if( $transaction->Type == "1")
                                                <small class="label bg-green">Crébit</small>
                                            @elseif( $transaction->Type == "0")
                                                <small class="label bg-yellow">Dédit</small>
                                            @endif
                                        </center>
                                    </td>
                                    <td>{{$transaction->Amount}}</td>
                                    <td> <strong> {{$transaction->Date}} </strong></td>
                                    <td>
                                        <center>
                                            <button type="submit" class="try-delete-user" data-id="{{$transaction->id}}" data-name="{{$transaction->id}}" data-url="/" title="supprimer"><span><i class="fa fa-trash" style="color:red;"></i></span></button>
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
            </div>

            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Vue d'ensemble</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-info">
                                    <th>N°</th>
                                    <th>Membres</th>
                                    <th>Date dernière transaction</th>
                                    <th>Montant</th>
                                    <th>Solde</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $user)
                                <tr>

                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td><strong> {{$transaction->Date}} </strong></td>
                                    <td>{{$transaction->Amount}}</td>
                                    <td> <strong> {{$transaction->Date}} </strong></td>

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
                                <h4 class="modal-title">Formulaire d'une Transaction</h4>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/admin/transaction/create">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Membre :</label>

                                        <select class="form-control select2" name="userId" style="width: 100%;">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Type de transaction :</label>

                                        <select class="form-control select2" name="type" style="width: 100%;">
                                            <option value="1">Créditer</option>
                                            <option value="0">Déditer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Montant :</label>

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                            <input type="text" class="form-control" name="montant" id="montant">
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