<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\City;
Use Auth;

class UserInfoController extends Controller
{
    public function  create(){
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $r_id = $user->role_id;
        $cities = City::all();
        return view('/userInformations.form',['role_id' => $r_id,  'cities' => $cities, 'user' => $user]);
    }

    public function store(Request $request){
        //dd($request);

        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $role_id = $user->role_id;

        if($role_id == 2){
            $this->validate($request,[
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'city' => 'required',
                'adresse' => 'required',
            ],[
                'first_name.required' => 'Le prénom est obligatoire.',
                'last_name.required' => 'Le nom est obligatoire.',
                'phone_number.required' => 'Le numéro de téléphone est obligatoire.',
                'city.required' => 'La ville est obligatoire.',
                'adresse.required' => 'L\'adresse est obligatoire.',
            ]);
        }else{
            $this->validate($request,[
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
            ],[
                'first_name.required' => 'Le prénom est obligatoire.',
                'last_name.required' => 'Le nom est obligatoire.',
                'phone_number.required' => 'Le numéro de téléphone est obligatoire.',
            ]);
        }

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'adresse' => $request->adresse,
            'about' => ''
        ];

        $user->city_id = null;
        if($request->input('city')){
            $city = $request->input('city');
            $city_input = City::where('name_ville',$city)->first();
            $city_id = $city_input->id;
            $user->city_id = $city_id;
        }

        $user->update($data);

        $request->session()->flash('status',"Vos informations personnelles ont bien été ajoutées");
        $request->session()->flash('alert-class',"alert-success");

        if($role_id == 2){
            return redirect()->action('ProfessionalAreaController@indexAppointment', ['id' => $userId]);
        }
        elseif($role_id == 3){
            return redirect()->action('ClientAreaController@index', ['id' => $userId]);
        }else{
            return view('welcome');
        }
    }
}
