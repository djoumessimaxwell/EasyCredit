<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Compte;
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
        $date = request('date');
        $trans->created_at = strtotime($date);

        $trans->save();

        $compte = Compte::where('UserId', request('userId'))->first();
        if($trans->Type == 'Dépôt'){
            $compte->Solde += request('montant');
        }elseif($trans->Type == 'Retrait'){
            $compte->Solde -= request('montant');
        }elseif($trans->Type == 'Virement'){
            $compte->Solde -= request('montant');

        }

        $compte->save();

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
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $trans = Transaction::find($id);
        $users = User::All();
        $output = array(
            'userId' => $trans->UserID,
            'type' => $trans->Type,
            'montant' => $trans->Amount,
            'date' => $trans->created_at->toFormattedDateString()
        );
        echo json_encode($output);
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
        $trans = Transaction::find($id);
        $type = $trans->Type;
        $amount = $trans->Amount;
        
        $trans->UserID = request('userId');
        $trans->Type = request('type');
        $trans->Amount = request('montant');
        $date = request('date');
        $trans->created_at = strtotime($date);
        $trans->save();

        $compte = Compte::where('UserId', request('userId'))->first();
        if($type == 'Dépôt'){
            $compte->Solde -= $amount;
        }elseif($type == 'Retrait'){
            $compte->Solde += $amount;
        }elseif($type == 'Virement'){
            $compte->Solde += $amount;
        }

        if($trans->Type == 'Dépôt'){
            $compte->Solde += request('montant');
        }elseif($trans->Type == 'Retrait'){
            $compte->Solde -= request('montant');
        }elseif($trans->Type == 'Virement'){
            $compte->Solde -= request('montant');
        }

        $compte->save();

        if($compte){
            $errors = "Modification réussie !";
            return redirect()->back()->withErrors($errors);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trans = Transaction::find($id);
        $type = $trans->Type;
        $amount = $trans->Amount;

        $compte = Compte::where('UserId', $trans->UserId)->first();
        if($type == '1'){
            $compte->Solde -= $amount;
        }elseif($type == '0'){
            $compte->Solde += $amount;
        }

        $compte->save();

        $trans->delete();

        if(!$trans){
            $errors = "Transaction supprimée !";
            return redirect()->back()->withErrors($errors);
        }else{
            return redirect()->back();
        }
    }
}
