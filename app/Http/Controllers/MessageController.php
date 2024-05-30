<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $token = \Illuminate\Support\Str::random(32);

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

    public function show($token)
    {
        $message = DB::table('messages')->where('token', $token)->first();

        if (!$message) {
            return abort(404, 'Message non trouvé');
        }

        if ($message->photo) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($message->photo);
        }

        DB::table('messages')->where('token', $token)->delete();

        return view('message.show', compact('message'));
    }
}
