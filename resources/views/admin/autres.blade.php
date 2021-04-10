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
            <li><a href="/accueil"><i class="fa fa-home"></i> Accueil</a></li>
        </ol>
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