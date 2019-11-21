<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

use App\Contact;

class ContactController extends Controller
{
    /**
     * Renvoyer la vue du formulaire de Contact
     */
    public function create()
    {
        return view('contact/create');
    }

    /**
     * Traitement des informations du formulaire de Contact
     */
    public function store()
    {
        // Vérification des champs
        request()->validate([
            'last_name' => 'required',
            'email' => 'required | email',
            'content' => 'required | min:10'
        ]);

        $data = [
            'last_name' => request('last_name'),
            'first_name' => request('first_name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'content' => request('content')
        ];
        // dd($data);
        // Envoi du mail
        Mail::to('contact@easy-rdv.com')->send(new ContactMail($data));

        // Envoi dans la BDD
        Contact::create($data);

        // On redirige vers la page d'accueil et on affiche le message 
        return redirect('/')->with('message','Votre message a bien été envoyé');
    }
}
