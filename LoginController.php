<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function connexion()
    {
        return view('login/create');
    }

    // Validation des champs
    public function store()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Permet de tester la connection de l'utilisateur
        auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);
    }

    public function createNew()
    {
        return view('user/index');
    }

    public function storeNew()
    {
        // Vérification des champs pour la création d'un compte
        request()->validate([
            'email_register' => 'required | email | unique:users,email',
            'password_register' => 'required | min:6 | confirmed',
            'cgu_register' => 'accepted'
        ], [
            'email_register.required' => 'Saisissez votre adresse e-mail.',
            'email_register.email' => 'Adresse e-mail non valide.',
            'email_register.unique' => 'Adresse e-mail déjà utilisée.',

            'password_register.required' => 'Entrez votre mot de passe.',
            'password_register.min' => 'Les mots de passe doivent au moins avoir 6 caractères.',
            'password_register.confirmed' => 'Les mots de passe ne correspondent pas.',

            'cgu_register.accepted' => 'Vous devez accepter les Conditions Générales d\'Utilisation.'
        ]);

        // Envoi dans la BDD
        User::create([
            'email' => request('email_register'),
            'password' => bcrypt(request('password_register')),
            'role_id' => 3
        ]);

        // On va sur le back-office de l'utilisateur
        return view('user/index');
    }
}
