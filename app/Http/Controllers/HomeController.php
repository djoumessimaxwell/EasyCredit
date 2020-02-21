<?php

namespace App\Http\Controllers;

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
        return view('dashboard');
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
