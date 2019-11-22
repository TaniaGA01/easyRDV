<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class LoginController extends Controller
{
    public function create()
    {
        return view('login/create');
    }

    public function store()
    {
        return back();
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
