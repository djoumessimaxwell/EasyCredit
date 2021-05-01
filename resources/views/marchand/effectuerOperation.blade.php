@extends('layout')

@section('title')
    Marchands
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper lockscreen">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="/accueil"><i class="fa fa-home"></i> Accueil</a></li>
        </ol>
    </section>

    <div class="lockscreen-wrapper"><div id="too"></div>
        <form id="operationForm" method="post" action="/marchand/operation/create/{{$id}}">
            {{ csrf_field() }}
            <div id="first">
                <div class="lockscreen-logo">
                    @if($id == 1)<b>Dépôt</b>
                    @elseif($id == 2)<b>Retrait</b>
                    @elseif($id == 3)<b>Transfert</b>
                    @elseif($id == 4)<b>Crédit</b>
                    @endif
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Numéro du client" style="border-radius: 20px">
                        <div class='alert-danger phone_error' style="margin: 0px 20px"></div>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="montant" name="montant" placeholder="Montant" style="border-radius: 20px">
                        <div class='alert-danger montant_error' style="margin: 0px 20px"></div>
                    </div>
                    <div class="form-group">
                        <a href="/marchand/operations" class="btn btn-default" style="border-radius: 20px; padding: 5px 50px">Annuler</a>
                        <button id="submit0" class="btn btn-success pull-right" style="border-radius: 20px; padding: 5px 50px">Valider</button>
                    </div>
                </div>
            </div>

            <div id="second">
                <div class="lockscreen-logo">
                    <h1>Validation de l'opération</h1>
                </div>
                <!-- User name -->
                <div class="lockscreen-name">{{Auth::user()->fullname}}</div>

                <!-- START LOCK SCREEN ITEM -->
                <div class="lockscreen-item">
                    <div class="lockscreen-image">
                        <img src="{{ URL::asset('img/user2-160x160.jpg') }}" alt="User Image">
                    </div>

                    <!-- lockscreen credentials (contains the form) -->
                    <div class="lockscreen-credentials">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="password" required>

                            <div class="input-group-btn">
                                <button type="button" id="submit1" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                            </div>
                        </div>
                        <div class='alert-danger password_error'></div>
                    </div>
                    <!-- /.lockscreen credentials -->
                </div>
                <br>
                <center class="form-group">
                    <button class="btn btn-default back" style="border-radius: 20px; padding: 5px 50px">Annuler</button>
                </center>
            </div>
        </form>

        <div id="third">
            <div class="box-body">
                <div class="form-group">
                    <center><h3 id="h3" style="color: red"></h3></center>
                </div>
                <center class="form-group">
                    <button class="btn btn-default back" style="border-radius: 20px; padding: 5px 50px">Retour</button>
                </center>
            </div>
        </div>

        <div id="fourth">
            <div class="box box-body" style="background: #d2d6de">
                <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
                <div class="form-group">
                    <center><img class="img-circle" src="{{ URL::asset('img/user2-160x160.jpg') }}" width="90px" alt="profile marchand">
                        <h4 id="h4"></h4>
                        @if($id == 1)<b>Dépôt : <span id="span"></span> FCFA</b>
                        @elseif($id == 2)<b>Retrait : <span id="span"></span> FCFA</b>
                        @elseif($id == 3)<b>Transfert</b>
                        @elseif($id == 4)<b>Crédit</b>
                        @endif
                    </center>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-default back" style="border-radius: 20px; padding: 5px 50px">Annuler</button>
                    <button id="submit2" class="btn btn-success pull-right" style="border-radius: 20px; padding: 5px 50px">Valider</button>
                </div>
            </div>
        </div>

        <div id="firth">
            <div class="box-body">
                <div class="form-group">
                    <center><b>Code de validation</b></center>
                    <input type="text" class="form-control" id="code" name="code" placeholder="code" style="border-radius: 20px">
                    <div class='alert-danger code_error' style="margin: 0px 20px"></div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-default back" style="border-radius: 20px; padding: 5px 50px">Annuler</button>
                    <button id="submit3" class="btn btn-success pull-right" style="border-radius: 20px; padding: 5px 50px">Terminer</button>
                </div>
            </div>
        </div>
    </div>   
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
    <script src="{{ URL::asset('js/script.js') }}"></script>
@endsection