@extends('layout')

@section('title')
    Crédit
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Solliciter un crédit
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Tableau de bord</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Simuler l'étalement du Crédit</h3>
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group col-md-4">
                                <label>Crédit sollicité :</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input type="number" class="form-control" name="montant" id="montant" placeholder="Montant">
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Recouvrement sur :</label>
                                <div style="display: flex;">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button onclick="document.getElementById('somme').value = ''" class="btn btn-default" id="type1">Durée mensuelle</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input type="number" class="form-control durée" id="durée" name="durée" style="display: none;" placeholder="Entrer la durée">
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button onclick="document.getElementById('durée').value = ''" class="btn btn-default" id="type2">Somme mensulle</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input type="number" class="form-control somme" style="display: none;" id="somme" name="somme" placeholder="Entrer la somme">
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" id="simuler" class="pull-right btn btn-success">Visualiser</button>
                        </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <h3 class="box-title">Tableau d'amortissement de la Dette</h3>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered" id="tab">
                                <thead>
                                    <tr class="bg-info">
                                        <th>N°</th>
                                        <th>Date de l'échéance</th>
                                        <th>Capital restant à amortir</th>
                                        <th>Intérêts courus (HT)</th>
                                        <th>Amortissement du capital</th>
                                        <th>TVA</th>
                                        <th>Mensualité TTC</th>
                                        <th>Capital restant dû</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr bgcolor="#b4b6ba">
                                        <th></th>
                                        <th><strong>Total</strong></th>
                                        <th></th>
                                        <th><strong></strong></th>
                                        <th><strong></strong></th>
                                        <th><strong>0</strong></th>
                                        <th><strong></strong></th>
                                        <th><strong>0</strong></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <strong>NB*</strong> : La somme marquée en <span style="color: red">rouge</span> dans le tableau, à hauteur de <strong id="x"></strong>, devra :<br>
                        - Etre remboursée au créancier, si elle est négative.<br>
                        - Etre payée par le créancier, si elle est positive.
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
    <script>
        $(function () {
            $("#type1").click(function(){
                $(".durée").slideToggle();
                $(".somme").hide();
            });
            $("#type2").click(function(){
                $(".somme").slideToggle();
                $(".durée").hide();
            });
            $("#simuler").click(function(){
                
                var montant = $('input[id=montant]').val();
                var durée = $('input[id=durée]').val();
                var somme = $('input[id=somme]').val();
                var html=document.getElementById('tab').innerHTML;
                var tab=html.split("<tbody>");

                if(durée != ''){
                    somme = (montant*(2/100))/(1-(Math.pow((1+(2/100)),(-durée))));
                    somme = Math.ceil(somme/100)*100;
                }
                else if(somme != ''){
                    durée = Math.ceil(-(Math.log(1-((montant*2/100)/somme))/Math.log(1+(2/100))));
                }
                reste = montant;
                html = tab[0];
                Tmensualité = durée * somme;
                Tintérêt = 0;
                Tamort = 0;

                for (var i = 0; i < durée; i++) {

                    montant = reste;
                    intérêt = reste*(2/100);
                    intérêt = Math.ceil(intérêt/100)*100;
                    amort = somme - intérêt;
                    reste = reste - amort;
                    j = i+1;
                    Tintérêt = Tintérêt + intérêt;
                    Tamort = Tamort + amort;

                    html = html+"\n<tr>";
                    html = html+"\n<td><center>"+j+"</center></td>";
                    html = html+"\n<td><center>"+"date"+j+"</center></td>";
                    html = html+"\n<td><center>"+montant+"</center></td>";
                    html = html+"\n<td><center>"+intérêt+"</center></td>";
                    html = html+"\n<td><center>"+amort+"</center></td>";
                    html = html+"\n<td><center>"+0+"</center></td>";
                    html = html+"\n<td><center>"+somme+"</center></td>";
                    html = html+"\n<td><center>"+reste+"</center></td>";
                    html = html+"\n</tr></tbody>\n";

                }
                html = html+"\n<tfoot><tr bgcolor='#b4b6ba'>";
                html = html+"\n<td><center>"+"</center></td>";
                html = html+"\n<td><center><strong>"+"Total"+"</strong></center></td>";
                html = html+"\n<td><center>"+"</center></td>";
                html = html+"\n<td><center><strong>"+Tintérêt+"</strong></center></td>";
                html = html+"\n<td><center><strong>"+Tamort+"</strong></center></td>";
                html = html+"\n<td><center><strong>"+0+"</strong></center></td>";
                html = html+"\n<td><center><strong>"+Tmensualité+"</strong></center></td>";
                html = html+"\n<td style='color:red;'><center><strong>"+reste+"</strong></center></td>";
                html = html+"\n</tr></tfoot></table>\n";
                document.getElementById('tab').innerHTML=html;
                document.getElementById('x').innerHTML=Math.abs(reste);
            });
        })
    </script>
@endsection