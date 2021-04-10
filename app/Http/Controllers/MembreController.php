<?php

namespace App\Http\Controllers;

use App\User;
use App\Client_ent;
use App\Role;
use App\Compte;
use App\Guichet;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MembreController extends Controller
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
    public function passwordChange(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ],
        ['confirm_password.same' => 'Ne correspond pas au nouveau mot de passe',]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        $notification = array(
            'message' => 'Mot de passe modifié !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->phone = request('phone');
        $user->CNI_number = request('CNI_number');
        $date = request('CNI_date');
        $user->CNI_date = strtotime($date);
        $user->CNI_place = request('CNI_place');
        $user->job = request('job');
        $user->toContact_name = request('toContact_name');
        $user->toContact_phone = request('toContact_phone');
        $date1 = Carbon::now();
        $user->created_at = strtotime($date1);
        $user->save();

        $user->roles()->attach(Role::where('name','Membre')->first());
        $user->guichets()->attach(Guichet::where('name','Carrefour Maçon')->first());

        $user->save();

        $compte = new Compte;
        $compte->UserId = $user->id;
        $compteId = Compte::max('id')+1;
        $compteId = str_pad($compteId, 7, '0', STR_PAD_LEFT);
        $compte->Account_number = "00001".$compteId."001"."1";
        $compte->ProductId = 1;
        $compte->Solde = 0;
        $compte->save();

        $notification = array(
            'message' => 'Votre compte a été créé avec succès !',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_ent(Request $request)
    {
        $user = new Client_ent;

        $user->Raison_sociale = request('raison_sociale');
        $user->Forme_juridique = request('forme_juridique');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->phone = request('phone');
        $user->Numero_contribuable = request('num_contribuable');
        $date = request('NC_date');
        $user->NC_date = strtotime($date);
        $user->Siege = request('siège');
        $user->Activité = request('activité');
        $user->SiteWeb = request('siteWeb');
        $date1 = Carbon::now();
        $user->created_at = strtotime($date1);
        $user->save();

        $user->roles()->attach(Role::where('name','Membre')->first());
        $user->guichets()->attach(Guichet::where('name','Carrefour Maçon')->first());

        $user->save();

        $compte = new Compte;
        $compte->Client_entId = $user->id;
        $compteId = Compte::max('id')+1;
        $compteId = str_pad($compteId, 7, '0', STR_PAD_LEFT);
        $compte->Account_number = "00001".$compteId."001"."2";
        $compte->ProductId = 1;
        $compte->Solde = 0;
        $compte->save();

        $notification = array(
            'message' => 'Votre compte a été créé avec succès !',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function showProfile($id)
    {
        $users = User::find($id);
        $solde = Compte::find($id);
        return view('/profile', compact('users','solde'));
    }

    public function showProfileById($id)
    {
        $user = User::find($id);
        return view('exams/users/profileById', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $users = User::All();
        $trans = Transaction::All();
        $soldes = Compte::All();
        return view('admin/membres', compact('users', 'trans','soldes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $trans = Transaction::All()->where('UserId', $id);
        $solde = Compte::where('UserId', $id)->first();
        return view('admin/update_membre', compact('user', 'trans','solde'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->firstname =$request->firstname;
        $user->lastname =$request->lastname;
        $user->phone = $request->phone;
        $user->email=$request->email;

        if(!$request['role']){
            
        }
        else{
            $user->roles()->detach();
            if($request['role'] == 1 ) {
                $user->roles()->attach(Role::where('name','Admin')->first());
            }

            if($request['role'] == 2 ) {
                $user->roles()->attach(Role::where('name','Personnel')->first());
            }

            if($request['role'] == 3 ) {
                $user->roles()->attach(Role::where('name','Membre')->first());
            }
        }
        $user->save();

        $notification = array(
            'message' => 'Modification réussie !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
           $user->is_deleted = '1';
           $user->save();
        }
        
        $usercompte = Compte::where('UserId', $id)->first();
        $usercompte->Solde = 0;

        $notification = array(
            'message' => 'Suppression réussie !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function showMarchands()
    {
        $users = User::All();
        return view('admin/marchands', compact('users'));
    }

    public function viewClient(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $output = array(
            'name' => $user->fullname,
            'email' => $user->email,
            'phone' => $user->phone,
            'date' => $user->created_at->toFormattedDateString(),
            'CNI' => $user->CNI_number,
            'dateCNI' => $user->CNI_date->toFormattedDateString(),
            'placeCNI' => $user->CNI_place,
            'job' => $user->job,
            'toContactName' => $user->toContact_name,
            'toContactPhone' => $user->toContact_phone
        );
        echo json_encode($output);
    }

    public function marchandClients()
    {
        $users = User::All()->where('is_deleted', '1');
        return view('marchand/clients', compact('users'));
    }
}
