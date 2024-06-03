<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageGoogle;
use App\Http\Requests\StoreMessageRequest;

class MessageController extends Controller
{
    // affichage du form create
    public function create()
    {
        return view('message.create');
    }

    // enregistrement BDD + envois email
    public function store(StoreMessageRequest $request)
    {

        // Si une photo a etait émis , on en enregistré la photo dans le store public sinon on met null
        // la photo est en option
        $path = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null;

        // on genere un token unique 32 caracteres
        $token = Str::random(32);

        // Enregistrer le message dans la base de données
        DB::table('messages')->insert([
            'message' => $request->input('message'),
            'photo' => $path,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Envoyer un email au destinataire
        // on appel une instance de la classe MessageGoogle, en passant la variable $token comme args
        Mail::to($request->input('email'))->send(new MessageGoogle($token));


        // Ajouter un message flash de succès
        $request->session()->flash('status', 'Message envoyé avec succès');

        // Rediriger avec un message de succès
        return redirect('/')->with('success', 'Message envoyé avec succès');
    }

    public function show($token)
    {
        // recupere la row dans la table messages en fonction du token
        $message = DB::table('messages')->where('token', $token)->first();

        // erreur 404 si le message n'est pas trouvé
        if (!$message) {
            return response()->view('errors.404', [], 404);
        }

        //  on stock le chemin de la photo dans la variable
        $photoPath = $message->photo ? asset('storage/' . $message->photo) : null;

        // on supprime la row de la bdd lorsque le snapmail est visualisé
        DB::table('messages')->where('token', $token)->delete();
        // on retourne la view avec le parametre qui est le chemin du path
        // view "show"
        return view('message.show', ['message' => $message, 'photoPath' => $photoPath]);
    }
}

