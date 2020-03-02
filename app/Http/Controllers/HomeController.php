<?php

namespace App\Http\Controllers;

use App\Compte;
use App\User;
use App\Transaction;
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
        $fond = Compte::get()->sum("Solde");
        $solde = Compte::where('UserId', auth()->user()->id)->first();
        $trans = Transaction::All()->where('UserId', auth()->user()->id);
        
        return view('dashboard', compact('solde', 'fond', 'membres', 'trans'));
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
        return view('/contact');
    }
}
