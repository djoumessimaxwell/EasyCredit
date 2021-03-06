@extends('layout')

@section('title')
    Marchands
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
            Gestion des Marchands 
        </h1>
        <ol class="breadcrumb">
            <li><a href="/accueil"><i class="fa fa-home"></i> Accueil</a> > Marchands</li>
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
                        <h3 class="box-title col-xs-6">Liste des marchands</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-block btn-success col-xs-4" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus-circle"></i> Ajouter</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-info">
                                    <th>Statut</th>
                                    <th>Nom</th>
                                    <th>Téléphone</th>
                                    <th>Solde</th>
                                    <th>Date d'adhésion</th>
                                    <th>Guichet</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($marchands as $marchand)
                                <tr>
                                    <td><center>
                                        @if( $marchand->is_deleted == 0)
                                            <small class="label bg-green">Actif</small>
                                        @else
                                            <small class="label bg-red">Inactif</small>
                                        @endif</center>
                                    </td>
                                    <td>{{$marchand->fullname}}</td>
                                    <td>{{$marchand->email}}</td>
                                    @foreach($soldes as $solde)
                                        @if($solde->UserId == $marchand->id)
                                            <td> <strong> {{$solde->Solde}} </strong></td>
                                        @endif
                                    @endforeach
                                    <td> <strong> {{$marchand->created_at->toFormattedDateString()}} </strong><br/>
                                        {{$marchand->created_at->diffForHumans()}}
                                    </td>

                                    <td>
                                    </td>

                                    <td>
                                        <center>
                                            <button type="button" data-toggle="modal" data-target="#modal-danger" data-id="{{$marchand->id}}" data-name="{{$marchand->fullname}}" data-url="/admin/marchand/delete/" title="supprimer" class="delete"><span><i class="fa fa-trash" style="color:red;"></i></span></button>
                                            <button type="button" title="modifier" class="update"><a href="/admin/marchand/edit/{{$marchand->id}}"><i class="fa fa-edit" style="color:blue;"> </i></a></button>
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
                    <div class="operation-box">
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="box-header bg-aqua-active">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4>Nouveau Marchand</h4>
                            </div>
                            <div class="box-footer">
                                <form method="POST" action="/admin/marchand/create">
                                    {{ csrf_field() }}
                                    <div id="div1" class="form-group">
                                        <label>Numéro du Marchand:</label>

                                        <input type="tel" name="number" class="form-control" placeholder="6xxxxxxxx">
                                        <div class='alert-danger number_error'></div>
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <input type="number" name="id" id="id" class="form-control">
                                    </div>
                                    <div id="div2" class="form-group">
                                        <center><img class="img-circle" src="{{ URL::asset('img/user2-160x160.jpg') }}" width="90px" alt="profile marchand">
                                        <h4 id="h4"></h4>
                                        <span id="span"></span></center>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Annuler</button>
                                    <button type="button" id="b1" class="btn btn-primary">Rechercher</button>
                                    <button type="submit" id="b2" class="btn btn-primary">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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
        $("#div2").hide();
        $("#b2").hide();
        var input = document.getElementsByName("number")[0];

        function phonenumberValidation(inputtxt) {
            var phone = /^\(?([0-9]{9})$/;
            var tel = input.value;
            if(inputtxt.value.match(phone)) {
                $.ajax({
                    method: "get",
                    url: "/admin/marchand/search",
                    data: {tel:tel},
                    dataType: 'json',
                    success: function(response){
                        $("#div1").hide();
                        $("#b1").hide();
                        $('#h4').html(response.name);
                        $('#span').html(response.email);
                        $('#id').val(response.id);
                        $("#div2").show();
                        $("#b2").show();
                    },
                    error: function(error){
                        $('.number_error').text("Ce client n'existe pas!");
                    }
                });
            }
            else {
                $('.number_error').text("Numéro invalide!");
            }
        }

        $('.btn').click(function(){
            $('.number_error').text("");
        });

        $("#b1").click(function(){
            phonenumberValidation(input);
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