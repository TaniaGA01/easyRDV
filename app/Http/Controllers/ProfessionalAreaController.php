<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\City;
use App\Appointment;
use App\Http\Requests\StoreNewAppointment;
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
    public function update(Request $request, $id){
        // #TODO vérification
        // dd($request);
        // "_token" => "UAal5oHZ9qpISDaPNOx145iante1GAZmkw3nbL8q"
        // "_method" => "PUT"
        // "last_name" => "problabla"
        // "first_name" => "erwan"
        // "email" => "erwanpro@gmail.com"
        // "phone" => "0684431339"
        // "adresse" => "49 rue des violettes"
        // "city" => "LINAS"
        // "about" => "Bonjour je suis blablabla"

        $user = User::find($id);
        //dd($user);

        request()->validate([
            'last_name' => 'bail | required | min:3',
            'first_name' => 'bail | required | min:3',
            'email' => 'bail | required | email',
            'phone' => 'bail | required',
            'adresse' => 'bail | required',
            'city' => 'bail | required'
        ]);

        $city = $request->input('city');
        $city_input = City::where('name_ville',$city)->first();
        $city_id = $city_input->id;

        $data = [
            'last_name' => request('last_name'),
            'first_name' => request('first_name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'adresse' => request('adresse'),
            // 'city' => $city_input->id,
            'about' => request('about')
        ];

        $user->city_id = $city_id;
        $user->update($data);

        $request->session()->flash('status',"Vos information personnelles ont bien été modifiés");
        $request->session()->flash('alert-class',"alert-success");
        return view('professionalArea/indexAgenda',[
            'user' => $user,
            ]);
    }

    /**
     * Ajout d'un rdv
     */
    public function store(StoreNewAppointment $request, $id){

        $validated = $request->validated();

        $newAppointment=new Appointment;
        $newAppointment->fill($validated);
        $newAppointment->id_pro = $id;

        if ($newAppointment->save()) {
            $request->session()->flash('status',"RDV enregistré avec succès");
            $request->session()->flash('alert-class',"alert-success");
            return redirect()->action('ProfessionalAreaController@indexAgenda', ['id' => $id]);
        }

    }
}
