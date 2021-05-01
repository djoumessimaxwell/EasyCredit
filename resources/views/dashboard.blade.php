@extends('layout')

@section('title')
    Dashboard
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Bienvenue 
          <small>{{Auth::user()->fullname}}</small>
      </h1>
      <ol class="breadcrumb">
          <li><i class="fa fa-home"></i> Tableau de bord</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="box-body">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
              <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
              <div class="item">
                <img src="{{ URL::asset('img/Scene.jpg') }}" alt="First slide">

              </div>
              <div class="item active">
                <img src="{{ URL::asset('img/Scene2.jpg') }}" alt="Second slide">

              </div>
              <div class="item">
                <img src="{{ URL::asset('img/Scene1.jpg') }}" alt="Third slide">

              </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
              <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
              <span class="fa fa-angle-right"></span>
            </a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-md-6">
          <!-- DIRECT CHAT -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Documentation</h3>
            </div>
            <div class="box-body no-padding">
            <table class="table table-striped">
                <tbody>
                <tr>
                  <td>
                    <img src="{{ URL::asset('img/file0.jpg') }}" alt="Product Image">
                  </td>
                  <td>
                    <label class="product-title">Formulaire d'inscription - "Particulier"</label>
                    <p>
                      Si vous êtes un Particulier, téléchargez ce formulaire et remplissez le, il vous sera demandé 
                      lors de la validation de l'ouverture de votre compte dans nos bureaux.
                    </p>
                  </td>
                  <td>
                    <a href="#"><span class="badge bg-yellow" title="Visualiser"><i class="fa fa-eye"></i></span></a>
                    <a href="#"><span class="badge bg-green" title="Télécharger"><i class="fa fa-download"></i></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="{{ URL::asset('img/file0.jpg') }}" alt="Product Image">
                  </td>
                  <td>
                    <label class="product-title">Formulaire d'inscription - "Entreprise"</label>
                    <p>
                    Si vous êtes une Entreprise, téléchargez ce formulaire et remplissez le, il vous sera demandé 
                      lors de la validation de l'ouverture de votre compte dans nos bureaux.
                    </p>
                  </td>
                  <td>
                    <a href="#"><span class="badge bg-yellow" title="Visualiser"><i class="fa fa-eye"></i></span></a>
                    <a href="#"><span class="badge bg-green" title="Télécharger"><i class="fa fa-download"></i></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="{{ URL::asset('img/file0.jpg') }}" alt="Product Image">
                  </td>
                  <td>
                    <label class="product-title">Politique de Netnoh</label>
                    <p>
                      
                    </p>
                  </td>
                  <td>
                    <a href="#"><span class="badge bg-yellow" title="Visualiser"><i class="fa fa-eye"></i></span></a>
                    <a href="#"><span class="badge bg-green" title="Télécharger"><i class="fa fa-download"></i></span></a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="{{ URL::asset('img/file0.jpg') }}" alt="Product Image">
                  </td>
                  <td>
                    <label class="product-title">Terms et Conditions de Netnoh</label>
                    <p>
                      
                    </p>
                  </td>
                  <td>
                    <a href="#"><span class="badge bg-yellow" title="Visualiser"><i class="fa fa-eye"></i></span></a>
                    <a href="#"><span class="badge bg-green" title="Télécharger"><i class="fa fa-download"></i></span></a>
                  </td>
                </tr>
              </tbody></table>
              
            </div>
          </div>
          <!--/.direct-chat -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <!-- USERS LIST -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Equipe Netnoh</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="users-list clearfix">
                <li style="margin:0% 12%">
                  <img src="{{ URL::asset('img/user2-160x160.jpg') }}" alt="User Image">
                  <a class="users-list-name" href="#">Rodrigue TEMFACK</a>
                  <span class="users-list-date">Directeur</span>
                </li>
                <li>
                  <img src="{{ URL::asset('img/user2-160x160.jpg') }}" alt="User Image">
                  <a class="users-list-name" href="#">Carlos NGOULA</a>
                  <span class="users-list-date">Responsable des Opérations</span>
                </li>
              </ul>
              <ul class="users-list clearfix">
                <li>
                  <img src="{{ URL::asset('img/user2-160x160.jpg') }}" alt="User Image">
                  <a class="users-list-name" href="#">Anicet KANA</a>
                  <span class="users-list-date">Contrôle Qualité et Audite</span>
                </li>
                <li>
                  <img src="{{ URL::asset('img/user2-160x160.jpg') }}" alt="User Image">
                  <a class="users-list-name" href="#">Ornella NGOULA</a>
                  <span class="users-list-date">Comtabilité et Finance</span>
                </li>
                <li>
                  <img src="{{ URL::asset('img/user2-160x160.jpg') }}" alt="User Image">
                  <a class="users-list-name" href="#">Maxwell DJOUMESSI</a>
                  <span class="users-list-date">Responsable SI</span>
                </li>
              </ul>
              <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="#" class="uppercase">View All Users</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!--/.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('script')
    <script>
      $(function () {
        $("#edit-btn").click(function(){

            $('#update-btn').removeAttr('Style');
            $('input[type=text]').removeAttr('readonly');
            $('input[type=file]').removeAttr('disabled');
            $('input[type=checkbox]').removeAttr('disabled');
            $('input[type=radio]').removeAttr('disabled');
            $('select').removeAttr('disabled');
        });
      })
    </script>
@endsection