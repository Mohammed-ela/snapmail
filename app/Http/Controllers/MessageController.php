<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create()
    {
        return view('message.create');
    }

    public function store(Request $request)
    {
        // Nous ajouterons le code pour gérer la soumission du formulaire plus tard
    }
}
