<?php

namespace App\Http\Controllers;

use App\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function show(Compte $compte)
    {
        return view('crédit');
    }

    public function simuler(Compte $compte)
    {
        return view('crédit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function edit(Compte $compte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compte $compte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compte $compte)
    {
        //
    }
}
