@extends('layout')

@section('title')
    Messages
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Messagerie
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Accueil</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Commentaires et suggestions des utilisateurs</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-info">
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>E-mail</th>
                                    <th>Objet</th>
                                    <th>Date réception</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($messages as $message)
                                <tr>

                                    <td>{{$message->id}}</td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->subject}}</td>
                                    <td> <strong> {{$message->created_at->toFormattedDateString()}} </strong><br/>
                                        {{$message->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <center>
                                            <button type="submit" class="try-delete-user" data-id="{{$message->id}}" data-name="{{$message->subject}}" data-url="/" title="supprimer"><span><i class="fa fa-trash" style="color:red;"></i></span></button>
                                            <button type="button" data-toggle="modal" data-target="#modal-success"><i class="fa fa-eye" style="color:blue;"> </i></button>
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
                            <div class="modal-header bg-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Message</h4>
                            </div>
                            <div class="modal-body">
                                <blockquote>
                                    
                                </blockquote>
                            </div>
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