<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ClientAreaController extends Controller
{
    /**
     * Affiche la page du client 
     */
    public function index($id){

        $user = Auth::user();
        $user_id = $user->id;
        if($id == $user_id){
            return view('clientArea/index',[
                'user' => $user, 
                ]);
        }else
            return view('welcome');
    }

    public function edit($id){
        $user = Auth::user();
        $user_id = $user->id;
        if($id == $user_id){
            return view('professionalArea/edit',['user' => $user]);
        }else{
            return view('welcome');
        }
    }
}
