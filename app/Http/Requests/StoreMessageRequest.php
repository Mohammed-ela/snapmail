<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


// La classe StoreMessageRequest gère la validation des entrées du formulaire
class StoreMessageRequest extends FormRequest
{

    public function authorize()
    {
        // tout le monde est autorisé a faire une requete (pas de auth)
        return true;
    }


    public function rules()
    {
        // Définition des règles de validation pour les champs du formulaire.
        return [
            // email obligatoire et dois etre un email
            'email' => 'required|email',

            // le message est requis et cest un texte
            'message' => 'required',

            // champ photo peut etre null mais dois il etre de type image
            'photo' => 'nullable|image',
        ];
    }
}
