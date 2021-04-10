<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAutres()
    {
        $users = User::All();
        return view('admin/autres', compact('users'));
    }
}
