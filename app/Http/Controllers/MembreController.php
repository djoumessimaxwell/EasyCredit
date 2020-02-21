<?php

namespace App\Http\Controllers;

use App\User;
use App\Transactions;
use Illuminate\Http\Request;

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
        //
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
        return view('admin/membres', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function updateProfile(Request $request, $id)
    {

        $profile = User::find($id);
        $profile->first_name =$request->first_name;
        $profile->last_name = $request->last_name;
        $profile->email=$request->email;

        $usersubscribed = Subscription::where('user_id', $id)->first();

        if($usersubscribed) {
            if($request->premium == 0){

                $usersubscribed->delete();

            }elseif($request->premium == 1){

                if(!$usersubscribed){
                    $subs = new Subscription;
                    $subs->user_id = $id;
                    $subs->expiration_date = Carbon::now()->addDays(30);
                    $subs->is_premium = 1;
                    $subs->is_premium_plus = 0;
                    //$subs->amount = $this->getAmount();
                    $subs->amount = 2;
                    $subs->save();
                }

            }
        }



        if(!$request['role_user'] && !$request['role_student'] && !$request['role_staff'] && !$request['role_author'] && !$request['role_teacher'] && !$request['role_instructor'] && !$request['role_admin'] && !$request['role_superadmin']){
            
        }
        else{
        $profile->roles()->detach();
        if($request['role_user']) {
            $profile->roles()->attach(Role::where('name','User')->first());
        }

        if($request['role_student']) {
            $profile->roles()->attach(Role::where('name','Student')->first());
        }

        if($request['role_staff']) {
            $profile->roles()->attach(Role::where('name','Staff')->first());
        }

        if($request['role_author']) {
            $profile->roles()->attach(Role::where('name','Author')->first());
        }
        if($request['role_teacher']) {
            $profile->roles()->attach(Role::where('name','Teacher')->first());
        }

        if($request['role_instructor']) {
            $profile->roles()->attach(Role::where('name','Instructor')->first());
        }

        if($request['role_admin']) {
            $profile->roles()->attach(Role::where('name','Admin')->first());
        }

        if($request['role_superadmin']) {
            $profile->roles()->attach(Role::where('name','SuperAdmin')->first());
        }
        }
        $profile->save();

        return redirect()->back();
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
            $userprofile = Profile::where('user_id', $id)->first();
            if($userprofile){
                $userprofile->delete();
            }
            $user->delete();

        }

        return redirect()->back();

    }
}
