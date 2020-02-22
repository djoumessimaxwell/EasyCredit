@extends('layout')

@section('title')
    Contact
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nous contacter
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Accueil</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <!-- quick email widget -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-envelope"></i>

                        <h3 class="box-title">Commentaires & Suggestions</h3>
                    </div>
                    <div class="box-body">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label>Objet :</label>
                                <input type="text" class="form-control" name="subject" placeholder="Objet">
                            </div>
                            <div>
                                <label>Message :</label>
                                <textarea class="form-control" placeholder="Message" style="width: 100%; height: 125px;font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-right btn btn-default" id="sendEmail">Envoyer
                        <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
                <!-- /.box -->
            </div>

            <div class="col-xs-6">
                <!-- quick email widget -->
                <div class="box box-success">
                    <div class="box-header">
                        <i class="fa fa-list"></i>

                        <h3 class="box-title">Détails</h3>
                    </div>
                    <div class="box-body">
                        <div class="info-box bg-default">
                            <span class="info-box-icon"><i class="ion ion-ios-paperplane-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-number">5,200</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <div class="info-box bg-default">
                            <span class="info-box-icon"><i class="ion ion-ios-location-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-number">5,200</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <div class="info-box bg-default">
                            <span class="info-box-icon"><i class="ion ion-ios-telephone-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-number">5,200</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <!-- quick email widget -->
                <div class="box box-danger">
                    <div class="box-header">
                        <i class="fa fa-list"></i>

                        <h3 class="box-title">Cartographie</h3>
                    </div>
                    <div class="box-body">
                        
                    </div>
                    <div class="box-footer clearfix">
                        
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
    
@endsection