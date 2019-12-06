<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfessionalAreaController extends Controller
{
    /**
     * Affiche la page "Mon agenda" du professionnel
     */
    public function indexAgenda($id){
        //$grid = self::getAgenda();

        $user = Auth::user();
        $user_id = $user->id;
        if($id == $user_id){
            return view('professionalArea/indexAgenda',[
                'user' => $user,
                ]);
        }else
            return view('welcome');
    }

    /**
     * Génère l'agenda
     */
    public function getAgenda(){

    }

    /**
     * Affiche la page/formulaire "Mes informations personnelles" du professionnel
     */
    public function edit($id){
        $user = Auth::user();
        $user_id = $user->id;
        if($id == $user_id){
            return view('professionalArea/edit',['user' => $user]);
        }else{
            return view('welcome');
        }
    }

    /**
     * Modifie la page/formulaire "Mes informations personnelles" du professionnel
     */
    public function update(){

    }

    /**
     * Ajout d'un rdv
     */
    public function store(Request $request){
        $post_id = $request->input('post_id');
        return $post_id;
    }
}
