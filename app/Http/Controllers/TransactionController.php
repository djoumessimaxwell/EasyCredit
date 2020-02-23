<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $trans = new Transaction;

        $trans->UserID = request('userId');
        $trans->Type = request('type');
        $trans->Amount = request('montant');
        $trans->Date = request('date');

        $trans->save();

        return redirect('/admin/transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $trans = Transaction::All();
        $users = User::All();
        return view('admin/transactions', compact('trans','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(id $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reserve = Reservation::find($id);
        
        $reserve->Numero = $request->numero;
        $reserve->DateReservation = $request->date;
        $reserve->vol_id = $request->vol;
        $reserve->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserve = Reservation::find($id);

        if($reserve) {
            $reserve->delete();
        } 
        return redirect('/');
    }
}
