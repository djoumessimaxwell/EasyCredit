@extends('layout')

@section('title')
    Documentation
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Documentation
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Accueil</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Présentation</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <center>
                            <img src="{{ URL::asset('img/Cap1.PNG') }}" class="img-responsive pad" alt="User Image">
                            <img src="{{ URL::asset('img/Cap2.PNG') }}" class="img-responsive pad" alt="User Image">
                            <img src="{{ URL::asset('img/Cap3.PNG') }}" class="img-responsive pad" alt="User Image">
                            <img src="{{ URL::asset('img/Cap4.PNG') }}" class="img-responsive pad" alt="User Image">
                            <img src="{{ URL::asset('img/Cap5.PNG') }}" class="img-responsive pad" alt="User Image">
                            <img src="{{ URL::asset('img/Cap6.PNG') }}" class="img-responsive pad" alt="User Image">
                            <img src="{{ URL::asset('img/Cap7.PNG') }}" class="img-responsive pad" alt="User Image">
                            <img src="{{ URL::asset('img/Cap8.PNG') }}" class="img-responsive pad" alt="User Image">
                        </center>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Réglementation</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h3>1. Conditions d'adhésion</h3>
                        <ul>
                            <li>Etre professionnellement actif</li>
                            <li>Avoir un avaliste au sein du GIF</li>
                            <li>Payer une inscription au montant de 2000FCFA non remboursable</li>
                            <li>Faire une demande d’adhésion à Easy Crédit à laquelle le membre joint une photo de sa CNI (recto, verso)</li>
                        </ul>

                        <h3>2. Fonctionnement</h3>
                        <ul>
                            <p><b>Easy crédit</b> fonctionne sur le principe d’une collecte de fonds mensuelle. Les fonds ainsi collecté sont mise à la disposition des membres à travers de crédits. </p>
                            <p><b>La collecte de fond</b> se fait comme suit :</p>

                            <li>Une contribution obligation par membre au fond d'un montant minimal de 5000FCFA par mois</li>
                            <li>Les cotisations se fond au plus tard le premier Samedi du mois</li>
                            <li>Pour les versements distant, le membre doit ajouter au montant de la cotisation les frais de retrait correspondant audit montant chez l'opérateur de transferts en question</li>
                            <li>Seuls les paiements distants via les systèmes paiements des opérateurs mobiles ou le compte bancaire du GIF sont autorisés</li>
                            <li>Les comptes du GIF (mobile et bancaire) sont disponibles pour les versements distants </li>
                            <li>Les différentes cotisations d’un membre constituent ses avoirs</li>
                            <li>Avec des avoirs supérieurs à 100.000FCFA, un membre peut demander un retrait en cas de nécessité. Toutefois, le minimum des avoirs d’un client en cas de retrait est de 100.000FCFA</li>
                            <li>Pour tout retrait d’avoir avec solde restant inférieur à 100.000FCFA, le membre est considéré comme démissionnaire</li><br>

                            <p><b>L’emprunt (crédit)</b> se fait comme suit :</p>

                            <li>La demande de crédit se fait au près du président</li>
                            <li>Une commission de 1000FCFA est reversée au fond pour chaque demande de crédit</li>
                            <li>Après trois (03) de cotisation sans échec au fond l'adhérent peut effectuer une demande de crédit d’un montant maximum de 100.000FCFA</li>
                            <li>Après 1 an de cotisation sans échec ou un montant total de cotisation de plus de 100.000FCFA, l’adhérent peut solliciter un crédit de plus de 100.000FCFA</li>
                            <li>La garantie d’un crédit est constituée par les avoirs du membre demandeur et de au plus 80% des avoirs disponibles de ses avalistes</li>
                            <li>Pour une demande de crédit, un membre peut solliciter l’aide d’un ou plusieurs avalistes</li>
                            <li>Le calcul du montant du prêt prend en compte les frais de départ du membre</li>
                        </ul>

                        <h3>3. Echec de cotisation</h3>
                        <ul>
                            <li>L'échec d'un membre à une cotisation mensuelle du fond est constaté lorsque ce membre n'a pas effectué le versement minimal de 5000FCFA</li>
                            <li>Un échec est constaté le premier samedi du mois à 18h</li>
                            <li>En cas d'échec le membre doit régulariser les paiements au plus tard le premier samedi du mois suivant avant 18h</li>
                            <li>Les échecs sont sanctionnés par une amande de 10% du montant des échecs cumulés</li>
                            <li>Après 3 échecs successifs, un membre est considéré comme démissionnaire</li>
                        </ul>

                        <h3>4. Avalistes</h3>
                        <ul>
                            <li>Un avaliste est un membre d’Easy Crédit dont les avoirs sont supérieurs ou égaux à 200.000FCFA. Le membre doit également avoir une ancienneté dans l’Easy Credit de 6mois minimum</li>
                            <li>Pour un crédit, un membre peut être avalisé par un ou plusieurs membres</li>
                            <li>Les avoirs de l’avaliste doivent être supérieurs d’au moins 20% au montant du prêt auquel est ajouté le montant total des intérêts dudit prêt et les frais de départ du membre et de son avaliste ajouté du </li>
                            <li>En cas de constat d'échec définitif d'un remboursement les avoirs du membre sont retenus pour le remboursement. Si ses avoirs sont insuffisants le montant restant est saisi des avoirs de l'avaliste (ou des avalistes le cas échéant) </li>
                        </ul>

                        <h3>5. Remboursement de crédit</h3>
                        <ul>
                            <li>Toute demande de crédit doit préciser le nombre de mensualité pour son remplacement</li>
                            <li>Pour les crédits d’une valeur nominal d’au plus 100.000FCFA, les remboursements se font en quatre (04) mensualités au plus</li>
                            <li>Pour les demandes de crédit supérieur à 100.000FCFA, les remboursements se font en huit (08) mensualités au plus</li>
                            <li>A chaque remboursement, les avoirs du membre sont mises à jour</li>
                        </ul>

                        <h3>6. Intérêt d'Easy Credit</h3>
                        <ul>
                            <p>Chaque crédit donne lieu à un paiement par le membre demandeur d’intérêts de 2% par mois géré comme suit :</p>

                            <li>Les intérêts sont payés au remboursement de chaque mensualité </li>
                            <li>Le taux d’intérêt de 2% est mensuel et porte sur le montant restant à rembourser</li>
                            <li>À la fin de chaque année, les intérêts générés par les différents crédits sont redistribué comme suit :
                                <ul>
                                    <li>50% est reversé aux membres d’Easy Crédit</li>
                                    <li>25% est reversé aux avalistes au prorata des montants qu’ils ont avalisé au court de l’année</li>
                                    <li>25% est reversé au GIF</li>
                                </ul>
                            </li>
                        </ul>

                        <h3>7. Echec de remboursement d'un prêt</h3>
                        <ul>
                            <li>En cas d'échec de remboursement d'un prêt, une pénalité mensuelle de 5% du montant total non remboursé est appliquée</li>
                            <li>Après 3 échecs successifs, le membre est considéré comme démissionnaire</li>
                            <li>Chaque échec est enregistré pour prise en compte lors des futures demandes du membre</li>
                        </ul>

                        <h3>8. Départ d'un membre</h3>
                        <ul>
                            <li>Tout membre est libre de quitter le fond</li>
                            <li>Des frais de départ 10 000 FCFA sont prélevé sur les avoirs du membre qui quitte le fond</li>
                            <li>Les avoirs du membre lui sont reversés après soustraction des frais de départ et de son solde de tous comptes</li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
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