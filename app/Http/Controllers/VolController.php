<?php

namespace App\Http\Controllers;

use App\Vol;
use App\Reservation;
use Illuminate\Http\Request;

class VolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vol = new Vol;

        $vol->Nom = request('nom');
        $vol->AeroportDépart = request('AeroportD');
        $vol->AeroportArrivée = request('AeroportA');
        $vol->DateDépart = request('dateD');
        $vol->HeureDépart = request('heureD');
        $vol->DateArrivée = request('dateA');
        $vol->HeureArrivée = request('heureA');
        $vol->Escale = request('escale');

        $vol->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vol  $vol
     * @return \Illuminate\Http\Response
     */
    public function showAll(Vol $vol)
    {
        $vol = Vol::all();
        $reserve = Reservation::all();
        return view('welcome', compact( 'vol', 'reserve'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vol  $vol
     * @return \Illuminate\Http\Response
     */
    public function edit(id $id)
    {
        $vol = Vol::find($id);
        return view('', compact('vol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vol  $vol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vol = Vol::find($id);
        if($vol) {
            $vol->Nom = $request->nom;
            $vol->DateDépart = $request->dateD;
            $vol->HeureDépart = $request->heureD;
            $vol->DateArrivée = $request->dateA;
            $vol->HeureArrivée = $request->heureA;
            $vol->save();
        }
        return redirect('/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vol  $vol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vol = Vol::find($id);
        
        if($vol) {
            $reserve = $vol->reservations()->get();
            $reserve->each->delete();

            $vol->delete();
        } 
        return redirect('/');
    }
}
