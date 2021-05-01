<?php

namespace App\Http\Controllers;

use App\Guichet;
use Illuminate\Http\Request;

class GuichetController extends Controller
{
    public function store(Request $request)
    {
        $guichet = new Guichet;

        $guichet->Name = request('name');
        $guichet->Number = request('number');
        $guichet->save();

        $notification = array(
            'message' => 'Le guichet a été créé avec succès !',
            'alert-type' => 'success'
        );

        return redirect('/admin/autres')->with($notification);
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
        $gui = Guichet::find($id);
        
        $gui->Name = request('name');
        $gui->Number = request('number');
        $gui->save();

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
        $gui = Guichet::find($id);

        $gui->delete();

        $notification = array(
            'message' => 'Suppression réussie !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
