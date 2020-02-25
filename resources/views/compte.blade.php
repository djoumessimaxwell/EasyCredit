@extends('layout')

@section('title')
    Crédit
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <center><h1>Cette page est actuellement en maintenance. Merci de l'a revisiter ultérieurement.</h1></center>
        <br><br>
    	<div class="row"><center>
            <div class="col-md-4" style="float: none;">
            	<button onclick="goBack()" type="button" class="btn btn-primary"><< Retour</button>
                <a href="/" type="button" class="btn btn-primary"><i class="fa fa-home"> </i> Accueil</a>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script>
    function goBack() {
      window.history.back();
    }
</script>
@endsection