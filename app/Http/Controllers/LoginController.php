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

    public function storeNew()
    {
        // Vérification des champs pour la création d'un compte
        request()->validate([
            'email_register' => 'required | email | unique:users,email',
            'password_register' => 'required | min:6 | confirmed',
            'cgu_register' => 'accepted'
        ]);

        $user = new User();
        $user->email = request('email_register');
        $user->password = bcrypt(request('password_register'));
        $user->role_id = 3;
        // Envoi dans la BDD
        $user->save();

        return view('admin');
    }
}
