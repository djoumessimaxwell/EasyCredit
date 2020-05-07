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
                <li><a href="/"><i class="fa fa-home"></i> Tableau de bord</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @if( Auth::user()->hasRole('Admin')  )
                <div class="col-lg-4 col-xs-12">
                <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $solde->Solde }} <small>FCFA</small></h3>

                            <p>Mon solde</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $fond }} <small>FCFA</small></h3>

                            <p>Fond total</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-android-cart"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $membres }}</h3>

                            <p>Membres</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                @else
                <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $solde->Solde }} <small>FCFA</small></h3>

                            <p>Mon solde</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                @endif
            </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
              
              <!-- TO DO List -->
              <div class="box box-danger">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Mes transactions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr class="bg-info">
                        <th>#</th>
                        <th>Date</th>
                        <th>Transaction</th>
                        <th>Débit</th>
                        <th>Crédit</th>
                        <th>Solde</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($trans as $tran)
                        <tr>
                          <td>{{$tran->id}}</td>
                          <td>{{$tran->created_at->toFormattedDateString()}}</td>
                          <td>
                            @if($tran->Type == "Dépôt")
                              <span class="text"><strong> Dépôt </strong></span>
                            @elseif($tran->Type == "Retrait")
                              <span class="text"><strong> Retrait </strong></span>
                            @elseif($tran->Type == "Virement")
                              <span class="text"><strong> Virement </strong></span>
                            @endif
                          </td>
                          <td>
                            @if($tran->Type == "Dépôt")
                              <span class="text"><strong> 0 </strong></span>
                            @elseif($tran->Type == "Retrait")
                              <span class="text"><strong> {{$tran->Amount}} </strong></span>
                            @endif
                          </td>
                          <td>
                            @if($tran->Type == "Dépôt")
                              <span class="text"><strong> {{$tran->Amount}} </strong></span>
                            @elseif($tran->Type == "Retrait")
                              <span class="text"><strong> 0 </strong></span>
                            @endif
                          </td>
                          <td>
                            @if($tran->Type == "Dépôt")
                              <span class="text"> {{$tran->Amount}} </span>
                            @elseif($tran->Type == "Retrait")
                              <span class="text" style="color: red"> -{{$tran->Amount}} </span>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>

                    <tfoot>
                      <tr bgcolor="#b4b6ba">
                        <td></td>
                        <td></td>
                        <td><strong>Total des opérations</strong></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{ $solde->Solde }}</strong></td>
                      </tr>
                    </tfoot>

                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-12 connectedSortable">

              <div class="box box-success">
                <div class="box-header">
                  <i class="ion ion-line-chart"></i>
                  <h3 class="box-title">Suivi de mes Crédits</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  
                </div>
              </div>
              <!-- /.box -->

            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->

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

        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : false,
          'info'        : true,
          'scrollX'     : true,
          'autoWidth'   : false
        })
      })
    </script>
@endsection