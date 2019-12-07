<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\User;
use Auth;

class ClientAreaController extends Controller
{
    /**
     * Affiche la page "Mes rendez-vous" du client 
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

    /**
     * Affiche la page/formulaire "Mes informations personnelles" du client
     */
    public function edit(Request $request, $id){
        $user = Auth::user();
        $user_id = $user->id;
        $cities = City::all();

        if($id == $user_id){
            return view('clientArea/edit',['user' => $user,'cities' => $cities]);
        }else{
            $request->session()->flash('status',"La page que vous cherchez n'existe pas");
            $request->session()->flash('alert-class',"alert-info");
            return view('welcome');
        }
    }

    /**
     * Modifie la page/formulaire "Mes informations personnelles" du client
     */
    public function update(Request $request, $id){
        $user = User::find($id);
        //dd($user);

        // #TODO champs requis ?
        request()->validate([
            'last_name' => 'bail | required | min:3',
            'first_name' => 'bail | required | min:3',
            'email' => 'bail | required | email',
            'phone' => 'bail | required'
        ]);
        

        $city = $request->input('city');
        $city_input = City::where('name_ville',$city)->first();
        $city_id = $city_input->id;

        $data = [
            'last_name' => request('last_name'),
            'first_name' => request('first_name'),
            'email' => request('email'),
            'phone_number' => request('phone'),
            'adresse' => request('adresse'),
            // 'city' => $city_input->id,
            'about' => request('about')
        ];

        $user->city_id = $city_id;
        $user->update($data);

        $request->session()->flash('status',"Vos informations personnelles ont bien été modifiées");
        $request->session()->flash('alert-class',"alert-success");
        return view('clientArea/index',[
            'user' => $user,
            ]);

    }
}
