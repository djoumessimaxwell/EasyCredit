<?php

namespace App\Http\Controllers;

use App\Compte;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $membres = User::All()->count();
        $comptes = Compte::All()->add();
        $solde = Compte::find(auth()->user()->id);
        
        return view('dashboard', compact('solde', 'fond', 'membres'));
    }

    /**
     * Display the documentation.
     *
     * @param  \App\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function showDoc()
    {
        return view('doc');
    }

    public function contact()
    {
        // $site = Site::find(1);
        // $homepage = $site->company->homepage;

        // $company = $site->company;
        return view('/contact');
    }
}
