<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Compte;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        $trans->senderId = request('userId');
        $trans->UserId = auth()->user()->id;
        $trans->Type = request('type');
        $trans->Amount = request('montant');
        $date = request('date');
        $trans->created_at = strtotime($date);

        $trans->save();

        $compte = Compte::where('senderId', request('userId'))->first();
        if($trans->Type == 'Dépôt'){
            $compte->Solde += request('montant');
        }elseif($trans->Type == 'Retrait'){
            $compte->Solde -= request('montant');
        }elseif($trans->Type == 'Virement'){
            $compte->Solde -= request('montant');
        }

        $compte->save();

        $notification = array(
            'message' => 'Transaction ajoutée avec succès !',
            'alert-type' => 'success'
        );

        return redirect('/admin/transactions')->with($notification);
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

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $trans = Transaction::find($id);
        $users = User::All();
        $output = array(
            'userId' => $trans->senderId,
            'type' => $trans->Type,
            'montant' => $trans->Amount,
        );
        echo json_encode($output);
    }

    public function update(Request $request, $id)
    {
        $trans = Transaction::find($id);
        $type = $trans->Type;
        $amount = $trans->Amount;
        
        $trans->senderId = request('userId');
        $trans->UserId = auth()->user()->id;
        $trans->Type = request('type');
        $trans->Amount = request('montant');
        $date = request('date');
        $trans->created_at = strtotime($date);
        $trans->save();

        $compte = Compte::where('senderId', request('userId'))->first();
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
        $trans = Transaction::find($id);
        $type = $trans->Type;
        $amount = $trans->Amount;

        $compte = Compte::where('senderId', $trans->UserId)->first();
        if($type == '1'){
            $compte->Solde -= $amount;
        }elseif($type == '0'){
            $compte->Solde += $amount;
        }

        $compte->save();

        $trans->delete();

        $notification = array(
            'message' => 'Suppression réussie !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function marchandOperations()
    {
        $trans = Transaction::All();
        $users = User::All();
            
        return view('marchand/operations', compact('trans','users'));
    }

    public function effectuerOperation($id)
    {
        $id = $id;
        return view('marchand/effectuerOperation', compact('id'));
    }

    public function verifyOperation(Request $request)
    {
        $number = $request->input('tel');
        $price = $request->input('montant');
        $current_password = $request->input('password');
        $password = auth()->user()->password;
        
        if(Hash::check($current_password, $password)){
            $user = User::where("email", $number)->first();
            if($user){
                $compte = Compte::where('UserId', $user->id)->first();
                $montant = $compte->Solde;
                if($price <= $montant){
                    $output = array(
                        'name' => $user->fullname,
                        'email' => $user->email,
                        'id' => $user->id,
                        'montant' => $price
                    );
                    echo json_encode($output);
                }else{
                    return response()->json(['status'=>2, 'error'=>"Solde insuffisant!"]);
                }
            }else {
                return response()->json(['status'=>1, 'error'=>"Ce client n'existe pas"]);
            }
        }else{
            return response()->json(['status'=>0, 'error'=>"Mot de passe incorrect"]);
        }
    }

    public function sendMessage(Request $request)
    {
        $code = Str::random(6);
        Session::put('Code', $code);
        $tel = $request->input('tel');
        $message = "Veuillez communiquer ce code à l'Agent qui traite votre opération pour la validation de la transaction : ".$code;
        $args = "api_key=JcRcnFsYNMpttCb&password=Ne!n0H@24&sender=NETNOH&message=".$message."&phone=237".$tel."&flag=long_sms";

        $url = "https://app.lmtgroup.com/bulksms/api/v1/push";

        $header = array("Content-Type: application/x-www-form-urlencoded;charset=utf-8" );

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        // Response
        $response = curl_exec($ch);
        $err = curl_error($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if(!$err){
            $output = "success";
            echo json_encode($output);   
        }
    }

    public function confirmCode(Request $request)
    {
        $code1 = $request->input('code');
        $code = Session::get('Code');
        if($code1 == $code){
            $output = "success";
            echo json_encode($output);
        }else{
            $output = "failed";
            echo json_encode($output);
        }
    }

    public function storeOperation(Request $request, $id)
    {
        $trans = new Transaction;

        if($id = 1){
            $tel = request('phone');
            $user = User::where('email', $tel)->first();

            $trans->senderId = $user->id;
            $trans->UserId = auth()->user()->id;
            $trans->Type = "Dépôt";
            $trans->Amount = request('montant');

            $trans->save();

            $compte = Compte::where('UserId', $user->id)->first();
            $compte->Solde += request('montant');

            $compte->save();

            $notification = array(
                'message' => 'Dépôt réussi !',
                'alert-type' => 'success'
            );

        }else if($id = 2){
            $tel = request('phone');
            $user = User::where('email', $tel)->first();

            $trans->senderId = $user->id;
            $trans->UserId = auth()->user()->id;
            $trans->Type = "Retrait";
            $trans->Amount = request('montant');

            $trans->save();

            $compte = Compte::where('UserId', $user->id)->first();
            $compte->Solde -= request('montant');

            $compte->save();

            $notification = array(
                'message' => 'Retrait réussi !',
                'alert-type' => 'success'
            );
        }
        return redirect('/marchand/operations')->with($notification);
    }
}
