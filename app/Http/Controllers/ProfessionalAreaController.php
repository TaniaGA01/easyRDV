<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\City;
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

        $cities = City::all();
        
        if($id == $user_id){
            return view('professionalArea/edit',[
                'user' => $user, 
                'cities' => $cities
            ]);
        }else{
            return view('welcome');
        }
    }

    /**
     * Modifie la page/formulaire "Mes informations personnelles" du professionnel
     */
    public function update(Request $request){
        //$tst = $request->option('data-value');
        $city = $request->input('city');
        $city_input = City::where('name_ville',$city)->first();
        dd($city,$city_input,$city_input->id);
    }

    /**
     * Ajout d'un rdv
     */
    public function store(Request $request){
        $contenu = $request->input('contenu');
        $post_id = $request->input('post_id');
        $id_pro = $request->input('id_pro');
        return $contenu;


    }
}
