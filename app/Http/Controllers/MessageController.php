<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function create()
    {
        return view('message.create');
    }

    public function store(Request $request)
    {
        // Valider les entrées du formulaire
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
            'photo' => 'nullable|image',
        ]);

        // Enregistrer la photo si elle est envoyée
        $path = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null;

        // Générer un token unique
        $token = Str::random(32);

        // Enregistrer le message dans la base de données
        DB::table('messages')->insert([
            'message' => $request->input('message'),
            'photo' => $path,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Rediriger avec un message de succès
        return redirect('/')->with('success', 'Message envoyé avec succès');
    }
}
