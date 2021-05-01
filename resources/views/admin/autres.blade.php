@extends('layout')

@section('title')
    Produits & Guichets
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestions des Produits et Guichets 
        </h1>
        <ol class="breadcrumb">
            <li><a href="/accueil"><i class="fa fa-home"></i> Accueil</a> > Produits & Guichets</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @if (count($errors))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fa fa-check"></i> Message envoyé !</h5>
                </div>
                @endif
            </div>

            <div class="col-lg-6">
                <!-- quick email widget -->
                <div class="box box-success">
                    <div class="box-header">
                        <i class="fa fa-cubes"></i>
                        <h3 class="box-title">Nos Produits</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-block btn-success col-xs-4" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus-circle"></i> Ajouter</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-info">
                                    <th>Nom du produit</th>
                                    <th>Numéro du produit</th>
                                    <th>Nombre de subcription</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($produits as $produit)
                                <tr>
                                    <td>{{$produit->Name}}</td>
                                    <td>{{$produit->Number}}</td>
                                    <td></td>

                                    <td>
                                        <center>
                                            <button type="button" data-toggle="modal" data-target="#modal-danger" data-id="{{$produit->id}}" data-name="{{$produit->Name}}" data-url="/admin/produit/delete/" title="supprimer" class="delete"><span><i class="fa fa-trash" style="color:red;"></i></span></button>
                                            <button type="button" title="modifier" class="update"><a href="/admin/produit/edit/{{$produit->id}}"><i class="fa fa-edit" style="color:blue;"> </i></a></button>
                                        </center>
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

            <div class="col-lg-6">
                <!-- quick email widget -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-map-marker"></i>
                        <h3 class="box-title">Nos Guichets</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-block btn-success col-xs-4" data-toggle="modal" data-target="#modal-success1"><i class="fa fa-plus-circle"></i> Ajouter</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-info">
                                    <th>Nom du guichet</th>
                                    <th>Numéro du guichet</th>
                                    <th>Nombre de clients</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($guichets as $guichet)
                                <tr>
                                    <td>{{$guichet->Name}}</td>
                                    <td>{{$guichet->Number}}</td>
                                    <td></td>

                                    <td>
                                        <center>
                                            <button type="button" data-toggle="modal" data-target="#modal-danger" data-id="{{$guichet->id}}" data-name="{{$guichet->Name}}" data-url="/admin/guichet/delete/" title="supprimer" class="delete"><span><i class="fa fa-trash" style="color:red;"></i></span></button>
                                            <button type="button" title="modifier" class="update"><a href="/admin/guichet/edit/{{$guichet->id}}"><i class="fa fa-edit" style="color:blue;"> </i></a></button>
                                        </center>
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

            <div class="modal modal-default fade" id="modal-success">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Nouveau produit</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/admin/produit/create" id="transForm">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Nom du produit :</label>

                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label>Numéro du produit :</label>

                                    <input type="number" class="form-control" name="number" id="number">
                                </div>
                                <div class="form-group">
                                    <label>Description :</label>

                                    <textarea type="text" class="form-control" name="desc" id="desc"></textarea>
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

            <div class="modal modal-default fade" id="modal-success1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Nouveau guichet</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/admin/guichet/create" id="transForm">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Nom du guichet :</label>

                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label>Numéro du guichet :</label>

                                    <input type="number" class="form-control" name="number" id="number">
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
          'scrollX'     : true,
          'autoWidth'   : false})
      })
    </script>
@endsection