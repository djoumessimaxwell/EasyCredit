<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Compte;
use App\Transaction;
use Illuminate\Http\Request;
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
        $user = new User;

        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->password = Hash::make('easycredit');
        $user->phone = request('phone');
        $date = request('date');
        $user->created_at = strtotime($date);
        $user->save();

        if(request('role') == 3) {
            $user->roles()->attach(Role::where('name','Membre')->first());
        }

        if(request('role') == 2) {
            $user->roles()->attach(Role::where('name','Personnel')->first());
        }

        if(request('role') == 1) {
            $user->roles()->attach(Role::where('name','Admin')->first());
        }

        $user->save();

        $compte = new Compte;
        $compte->UserId = $user->id;
        $compte->Solde = 0;
        $compte->save();

        return redirect('/admin/membres');
    }

    public function showProfile()
    {
        $user = User::where('user_id',auth()->user()->id)->first();
        return view('exams/users/profile', compact('user'));
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
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $users = User::find($id);
        $output = array(
            'firstname' => $users->firstname,
            'lastname' => $users->lastname,
            'tel' => $users->phone,
            'email' => $users->email,
            'role' => $users->role,
            'date' => $users->created_at->toFormattedDateString()
        );
        echo json_encode($output);
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

        if($user){
            $errors = "Modification réussie !";
            return redirect()->back()->withErrors($errors);
        }else{
            return redirect()->back();
        }
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
        
        $usercompte = Compte::where('UserId', $id)->first();
        if($usercompte){
            $usercompte->delete();
        }
        $user->delete();

        if(!$user){
            $errors = "Membre supprimé !";
            return redirect()->back()->withErrors($errors);
        }else{
            return redirect()->back();
        }

    }
}
