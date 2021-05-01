<?php

namespace App\Http\Controllers;

use App\User;
use App\Client__ent;
use App\Role;
use App\Compte;
use App\Guichet;
use App\Transaction;
use App\Responsable_ent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;

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

    public function modalValidation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => ['required'],
            'email' => ['required', 'unique:users', 'digits:9'],
            'phone' => ['nullable', 'unique:users', 'email:rfc,dns'],
            'email1' => ['required', 'unique:client__ents', 'digits:9'],
            'phone1' => ['nullable', 'unique:client__ents', 'email:rfc,dns'],
            'name' => ['required'],
            'email2' => ['required', 'unique:responsable_ents', 'digits:9'],
            'phone1' => ['nullable', 'unique:responsable_ents', 'email:rfc,dns'],
            'job' => ['required'],
            'CNI_number' => ['required', 'unique:users', 'digits_between:7,9'],
            'CNI_date' => ['required', 'date'],
            'CNI_place' => ['required'],
            'raison_sociale' => ['required'],
            'forme_juridique' => ['required'],
            'siteWeb' => ['nullable', 'url'],
            'activité' => ['required'],
            'num_contribuable' => ['required', 'unique:client__ents', 'min:12', 'max:14'],
            'NC_date' => ['required', 'date'],
            'siège' => ['required'],
            'password' => ['required', 'min:8'],
            'confirm_password' => ['same:password'],
            'checkbox' => ['accepted'],
        ],
        ['confirm_password.same' => 'Ne correspond pas',
        'accepted'=>'Veuillez cocher la case avant de continuer',
        'required'=>'Ce champ est obligatoire',
        'phone.unique'=>'Un utilisateur avec ce mail existe déjà',
        'email.unique'=>'Un utilisateur avec ce numéro existe déjà',
        'CNI_number.unique'=>'Un utilisateur avec ce numéro de CNI existe déjà',
        'num_contribuable.unique'=>'Un utilisateur avec ce numéro de contribuable existe déjà',
        'digits'=>'Veuillez saisir un numéro valide à 9 chiffres',
        'digits_between'=>'Numéro CNI(Passeport) non-conforme',
        'email'=>'Ce mail est invalide. Doit inclure @',
        'date'=>'Invalide. Veuillez saisir une date',
        'url'=>'Invalide. Veuillez saisir un URL',
        'password.min'=>'Minimum 8 caractères',
        'num_contribuable.min'=>'Numéro de contribuable non-conforme',
        'num_contribuable.max'=>'Numéro de contribuable non-conforme',
    ]);
   
        if ($validator->fails())
        {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
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
    public function storePart(Request $request)
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

        $id = $user->id;
        if($request->hasFile('photo'))
        {
            $file= request('photo');
                $filename = $file->getClientOriginalName();
                $full_path = Storage::disk('imageProfile')->putFileAs('imageProfile-Part/'.$id , $file, $file->getClientOriginalName());
                $full_path = '/img/'.$full_path;
                $file_path = '/img/imageProfile-Ent/'.$id ; 
            $user->image_link = $full_path;
        }

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
            'message' => 'Compte créé avec succès !',
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
    public function storeEnt(Request $request)
    {
        $user = new Client__ent;

        $user->Raison_sociale = request('raison_sociale');
        $user->Forme_juridique = request('forme_juridique');
        $user->email = request('email1');
        $user->password = Hash::make(request('password'));
        $user->phone = request('phone1');
        $user->Numero_contribuable = request('num_contribuable');
        $date = request('NC_date');
        $user->NC_date = strtotime($date);
        $user->Siege = request('siège');
        $user->Activité = request('activité');
        $user->SiteWeb = request('siteWeb');
        $date1 = Carbon::now();
        $user->created_at = strtotime($date1);
        $user->save();

        $id = $user->id;
        if($request->hasFile('photo'))
        {
            $file= request('photo');
                $filename = $file->getClientOriginalName();
                $full_path = Storage::disk('imageProfile')->putFileAs('imageProfile-Ent/'.$id , $file, $file->getClientOriginalName());
                $full_path = '/img/'.$full_path;
                $file_path = '/img/imageProfile-Part/'.$id ; 
            $user->image_link = $full_path;
        }
        $user->roles()->attach(Role::where('name','Membre')->first());
        $user->guichets()->attach(Guichet::where('name','Carrefour Maçon')->first());
        $user->save();

        $resp = new Responsable_ent;
        $resp->client_entId = $id;
        $resp->firstname = request('name');
        $resp->email = request('email1');
        $resp->phone = request('phone1');
        $resp->CNI_number = request('CNI_number');
        $date = request('CNI_date');
        $resp->CNI_date = strtotime($date);
        $resp->CNI_place = request('CNI_place');
        $resp->poste = request('job');
        $resp->save();

        $compte = new Compte;
        $compte->Client_entId = $user->id;
        $compteId = Compte::max('id')+1;
        $compteId = str_pad($compteId, 7, '0', STR_PAD_LEFT);
        $compte->Account_number = "00001".$compteId."001"."2";
        $compte->ProductId = 1;
        $compte->Solde = 0;
        $compte->save();

        $notification = array(
            'message' => 'Compte créé avec succès !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function showProfile($id)
    {
        $users = User::find($id);
        $solde = Compte::where('UserId', $id)->first();
        return view('/profile', compact('users','solde'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAll_part()
    {
        $users = User::All();
        $trans = Transaction::All();
        $comptes = Compte::All();
        return view('admin/membresPart', compact('users', 'trans','comptes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAll_ent()
    {
        $users = Client__ent::All();
        $trans = Transaction::All();
        $comptes = Compte::All();
        return view('admin/membresEnt', compact('users', 'trans','comptes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPart(Request $request, $id)
    {
        $user = User::find($id);
        $trans = Transaction::All()->where('UserId', $id);
        $solde = Compte::where('UserId', $id)->first();
        return view('admin/update_membrePart', compact('user', 'trans','solde'));
    }

    public function editEnt(Request $request, $id)
    {
        $user = Client__ent::find($id);
        $trans = Transaction::All()->where('UserId', $id);
        $solde = Compte::where('Client_entId', $id)->first();
        return view('admin/update_membreEnt', compact('user', 'trans','solde'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePart(Request $request, $id)
    {

        $user = User::find($id);
        $user->firstname =$request->firstname;
        $user->lastname =$request->lastname;
        $user->phone = $request->phone;
        $user->email=$request->email;
        $date=$request->date;
        $user->created_at = strtotime($date);

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

    public function updateEnt(Request $request, $id)
    {

        $user = Client__ent::find($id);
        $user->Raison_sociale =$request->RS;
        $user->Forme_juridique =$request->FJ;
        $user->phone = $request->phone;
        $user->email=$request->email;
        $date=$request->date;
        $user->created_at = strtotime($date);

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
    public function destroyPart($id)
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

    public function destroyEnt($id)
    {
        $user = Client__ent::find($id);
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

    public function showClients_Part()
    {
        $users = User::All()->where('is_deleted', '1');
        return view('marchand/clientsPart', compact('users'));
    }

    public function showClients_Ent()
    {
        $users = Client__ent::All()->where('is_deleted', '1');
        return view('marchand/clientsEnt', compact('users'));
    }

    public function viewClient(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $date = '';
        if($user->CNI_date){
            $date = $user->CNI_date->toFormattedDateString();
        }
        $output = array(
            'name' => $user->fullname,
            'email' => $user->email,
            'phone' => $user->phone,
            'date' => $user->created_at->toFormattedDateString(),
            'CNI' => $user->CNI_number,
            'dateCNI' => $date,
            'placeCNI' => $user->CNI_place,
            'job' => $user->job,
            'toContactName' => $user->toContact_name,
            'toContactPhone' => $user->toContact_phone
        );
        echo json_encode($output);
    }

    public function viewClient_ent(Request $request)
    {
        $id = $request->input('id');
        $user = Client__ent::find($id);
        $user1 = Responsable_ent::where('client_entId', $user->id)->first();
        $date = '';
        if($user->NC_date){
            $date = $user->NC_date->toFormattedDateString();
        }
        if($user1->CNI_date){
            $date1 = $user1->CNI_date->toFormattedDateString();
        }
        $output = array(
            'RS' => $user->Raison_sociale,
            'FJ' => $user->Forme_juridique,
            'email' => $user->email,
            'phone' => $user->phone,
            'date' => $user->created_at->toFormattedDateString(),
            'NC' => $user->Numero_contribuable,
            'dateNC' => $date,
            'siège' => $user->Siege,
            'activité' => $user->Activité,
            'name' => $user1->firstname,
            'email1' => $user1->email,
            'phone1' => $user1->phone,
            'CNI' => $user1->CNI_number,
            'dateCNI' => $date1,
            'placeCNI' => $user1->CNI_place,
            'job' => $user1->poste
        );
        echo json_encode($output);
    }

    public function activerClient($id)
    {
        $user = User::find($id);
        $user->is_deleted = '0';
        $user->save();

        $notification = array(
            'message' => 'Client activé !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function activerClient_ent($id)
    {
        $user = Client__ent::find($id);
        $user->is_deleted = '0';
        $user->save();

        $notification = array(
            'message' => 'Client activé !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function showMarchands()
    {
        $roleName='Marchand';
        $marchands = User::whereHas('roles', function ($q) use ($roleName) {
            $q->where('name', $roleName);
        })->get();
        $roleName='Membre';
        $users = User::whereHas('roles', function ($q) use ($roleName) {
            $q->where('name', $roleName);
        })->get();
        $soldes = Compte::All();
        return view('admin/marchands', compact('marchands', 'users', 'soldes'));
    }

    public function searchMarchand(Request $request)
    {
        $number = $request->input('tel');
        $user = User::where("email", $number)->first();
        if($user){
            $output = array(
                'name' => $user->fullname,
                'email' => $user->email,
                'id' => $user->id
            );
        }
        echo json_encode($output);
    }

    public function storeMarchand(Request $request)
    {
        $id=$request->id;
        $user = User::find($id);
        $user->roles()->detach();
        $user->roles()->attach(Role::where('name','Marchand')->first());
        $user->save();

        $notification = array(
            'message' => 'Marchand ajouté avec succès!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function destroyMarchand($id)
    {
        $user = User::find($id);
        $user->roles()->detach();
        $user->roles()->attach(Role::where('name','Membre')->first());
        $user->save();

        $notification = array(
            'message' => 'Marchand supprimé avec succès!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
