<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Guichet;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function store(Request $request)
    {
        $produit = new Produit;

        $produit->Name = request('name');
        $produit->Number = request('number');
        $produit->Solde = 0;
        $produit->Description = request('desc');
        $produit->save();

        $notification = array(
            'message' => 'Le produit a été créé avec succès !',
            'alert-type' => 'success'
        );

        return redirect('/admin/autres')->with($notification);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAutres()
    {
        $produits = Produit::All();
        $guichets = Guichet::All();
        return view('admin/autres', compact('produits', 'guichets'));
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $trans = Transaction::find($id);
        $users = User::All();
        $output = array(
            'userId' => $trans->UserID,
            'type' => $trans->Type,
            'montant' => $trans->Amount,
        );
        echo json_encode($output);
    }

    public function update(Request $request, $id)
    {
        $prod = Produit::find($id);
        
        $prod->Name = request('name');
        $prod->Number = request('number');
        $prod->Description = request('desc');
        $prod->save();

        $notification = array(
            'message' => 'Modification réussie !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produit::find($id);

        $prod->delete();

        $notification = array(
            'message' => 'Suppression réussie !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
