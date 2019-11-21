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
        $user = new User();
        $user->email = request('email_register');
        $user->password = bcrypt(request('password_register'));
        $user->save();

        return view('admin');
    }
}
