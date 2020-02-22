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
                <div class="box">
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
                                    <td>{{$transaction->user[name]}}</td>
                                    <td>
                                        @if( $transaction->Type == "Débit")
                                            <small class="label bg-green">Débit</small>
                                        @elseif( $transaction->Type == "Crédit")
                                            <small class="label bg-yellow">Crédit</small>
                                        @endif</center>
                                    </td>
                                    <td>{{$transaction->Amount}}</td>
                                    <td> <strong> {{$transaction->Date->toFormattedDateString()}} </strong></td>
                                    <td><center>
                                        <button type="submit" class="try-delete-user" data-id="{{$transaction->id}}" data-name="{{$transaction->id}}" data-url="/" title="supprimer"><span><i class="fa fa-trash" style="color:red;"></i></span></button></center>
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
                <div class="modal modal-success fade" id="modal-success">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Formulaire d'une Transaction</h4>
                            </div>
                            <div class="modal-body">
                                <form >
                                    <div class="form-group">
                                        <label>Membre :</label>

                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected">Alabama</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Type de transaction :</label>

                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected">Débit</option>
                                            <option>Crédit</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Montant :</label>
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Date de transaction :</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Annuler</button>
                                    <button type="button" class="btn btn-outline">Valider</button>
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