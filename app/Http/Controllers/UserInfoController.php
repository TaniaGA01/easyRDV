<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserInfoController extends Controller
{
    public function  create(){

        return view('/userInformations.form');

    }

    public function store(){
        

    }
}
