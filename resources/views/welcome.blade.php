<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wefly</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    WEFLY
                </div>
                <div class="font-italic">Agence de vols intercontinentaux au Cameroun</div>
            </div>
        </div>

        <div class="vol">
            <div id="vol" class="vol-form">
                <button class="btn btn-success col-sm-2 sp" id="volbtn" title="ajouter un vol">
                    <span id="hidevol">-</span><span id="showvol">+</span> Vol
                </button>

                <form id="volForm" method="POST" action="vol/create">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nom du vol : </label>
                        <input class="form-control col-sm-8" id="nom" name="nom">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Aéroport de départ : </label>
                        <select class="form-control col-sm-8" id="AeroportD" name="AeroportD">
                            <option value="Bamako">Bamako</option>
                            <option value="Douala">Douala</option>
                            <option value="Yaoundé">Yaoundé</option>
                            <option value="Ndjamena">Ndjamena</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Aéroport d'arrivée : </label>
                        <select class="form-control col-sm-8" id="AeroportA" name="AeroportA">
                            <option value="Ndjamena">Ndjamena</option>
                            <option value="Yaoundé">Yaoundé</option>
                            <option value="Bamako">Bamako</option>
                            <option value="Douala">Douala</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Date de départ : </label>
                        <input class="form-control col-sm-8" id="dateD" name="dateD">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Heure de départ : </label>
                        <input class="form-control col-sm-8" id="heureD" name="heureD">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Date d'arrivée : </label>
                        <input class="form-control col-sm-8" id="dateA" name="dateA">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Heure d'arrivée : </label>
                        <input class="form-control col-sm-8" id="heureA" name="heureA">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Escale : </label>
                        <select class="form-control col-sm-8" id="escale" name="escale">
                            <option value="Brazzaville">Brazzaville</option>
                            <option value="Dakar">Dakar</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="save-vol">Créer</button>
                            <button type="submit" class="btn btn-primary" id="update-vol">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>

            <hr>

            <center><h3>Liste des Vols</h3></center><br>
            <table id="VolTable" class="table table-sm table-striped table-bordered" style="text-align: center">
                <thead>
                    <tr class="bg-info">
                        <th scope="col">id </th>
                        <th scope="col">Vol</th>
                        <th scope="col">Départ</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Date de départ</th>
                        <th scope="col">Heure de départ</th>
                        <th scope="col">Date d'arrivée</th>
                        <th scope="col">Heure d'arrivée</th>
                        <th scope="col">Escale</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vol as $Vol)
                        <tr>
                            <td>
                                {{$Vol->id}}
                            </td>

                            <td>
                                {{$Vol->Nom}}
                            </td>

                            <td>
                                {{$Vol->AeroportDépart}}
                            </td>

                            <td >
                                {{$Vol->AeroportArrivée}}
                            </td>

                            <td>
                                {{$Vol->DateDépart}}
                            </td>

                            <td >
                                {{$Vol->HeureDépart}}
                            </td>

                            <td>
                                {{$Vol->DateArrivée}}
                            </td>

                            <td >
                                {{$Vol->HeureArrivée}}
                            </td>

                            <td >
                                {{$Vol->Escale}}
                            </td>

                            <td style="display: inline-flex;">
                                <button id="edit-vol" data-id="{{$Vol->id}}" title="modifier">
                                    <span><i class="fa fa-pencil" style="color:dodgerblue;"></i></span>
                                </button>

                                <button type="submit" class="delete-vol" data-id="{{$Vol->id}}" data-name="{{$Vol->Nom}}" data-url="/vol/delete/" title="supprimer" style="margin-left: 10px">
                                    <span><i class="fa fa-trash" style="color:red;"></i></span>
                                </button>

                            </td>

                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="vol">
            <div id="reserve" class="vol-form">
                <button class="btn btn-success col-sm-2 sp" id="reservebtn" title="ajouter une reservation">
                    <span id="hidereserve">-</span><span id="showreserve">+</span> Reservation
                </button>

                <form id="reserveForm" method="POST" action="/reservation/create">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Numéro de reservation : </label>
                        <input class="form-control col-sm-8" id="numero" name="numero">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Date de reservation : </label>
                        <input class="form-control col-sm-8" id="date" name="date">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Vol : </label>
                        <select class="form-control col-sm-8" id="vol" name="vol">
                            @foreach($vol as $Vol)
                                <option value="{{$Vol->id}}">{{$Vol->Nom}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Passager : </label>
                        <select class="form-control col-sm-8" id="passager" name="passager">
                            <option value="Antoine">Antoine</option>
                            <option value="Fred">Fred</option>
                            <option value="Maxwell">Maxwell</option>
                            <option value="Tony">Tony</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="save-reserve">Créer</button>
                            <button type="submit" class="btn btn-primary" id="update-reserve">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>

            <hr>

            <center><h3>Liste des Reservation</h3></center><br>
            <table id="ReservationTable" class="table table-sm table-striped table-bordered" style="text-align: center">
                <thead>
                    <tr class="bg-info">
                        <th scope="col">id </th>
                        <th scope="col">Numéro</th>
                        <th scope="col">Vol reservé</th>
                        <th scope="col">Date de reservation</th>
                        <th scope="col">Passager</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reserve as $Reserve)
                        <tr>
                            <td>
                                {{$Reserve->id}}
                            </td>

                            <td>
                                {{$Reserve->Numero}}
                            </td>

                            <td>
                                {{$Reserve->vol['Nom']}}
                            </td>

                            <td >
                                {{$Reserve->DateReservation}}
                            </td>

                            <td >
                                {{$Reserve->Passager}}
                            </td>

                            <td style="display: inline-flex;">
                                <button id="edit-reserve" data-id="{{$Reserve->id}}" title="modifier">
                                    <span><i class="fa fa-pencil" style="color:dodgerblue;"></i> </span>
                                </button>

                                <button type="submit" class="delete-reserve" data-id="{{$Reserve->id}}" data-name="{{$Reserve->Numero}}" data-url="/reservation/delete/" title="supprimer" style="margin-left: 10px">
                                    <span><i class="fa fa-trash" style="color:red;"></i></span>
                                </button>

                            </td>

                        </tr>

                    @endforeach
                </tbody>
            </table>

            <div id="confirm-delete-vol" class="global">
                Confirmez vous la suppression du vol ? 
                <div class="question-g-delete-q"><h3></h3></div>
                Cette action supprimera également toutes les reservations liées à ce vol.

                <div class="delete-cancel-buttons">
                    <form id="delete-form1" method="POST" action="">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <div class="btn-next">
                            <button type="submit" class="btn btn-sm btn-danger btn-delete">Oui</button>
                        </div>
                    </form>
                    <div class="btn-next">
                        <button class="btn btn-sm btn-success cancel-delete">Annuler</button>
                    </div>

                </div>
            </div>

            <div id="confirm-delete-reserve" class="global">
                Confirmez vous la suppression de la reservation ? 
                <div class="question-g-delete-q"><h3></h3></div>

                <div class="delete-cancel-buttons">
                    <form id="delete-form2" method="POST" action="">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <div class="btn-next">
                            <button type="submit" class="btn btn-sm btn-danger btn-delete">Oui</button>
                        </div>
                    </form>
                    <div class="btn-next">
                        <button class="btn btn-sm btn-success cancel-delete">Annuler</button>
                    </div>

                </div>
            </div>

        </div>
    </body>
    <script src="{{ URL::asset('js/app.js') }}"></script>
</html>
