<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\User;
use App\Appointment;
use App\Profession;
use Auth;

class ClientAreaController extends Controller
{
    /**
     * Affiche la page "Mes rendez-vous" du client 
     */
    public function index(Request $request, $id){

        $user = Auth::user();
        $user_id = $user->id;

        // SELECT * FROM `appointments` WHERE id_client = 22 
        // https://stackoverflow.com/questions/19325312/how-to-create-multiple-where-clause-query-using-laravel-eloquent
        $appointments = Appointment::where('id_client', $user_id)->get();
        //dd($appointments);
        $tab_pro_name = [];
        $tab_pro_profession = [];
        $tab_pro_adresse = [];
        $tab_pro_city = [];
        $tab_pro_phone = [];
        $tab_day = [];
        $tab_hour = [];

        foreach($appointments as $appointment){
            $id_pro = $appointment->id_pro;
            $pro = User::find($id_pro);
            $pro_name = $pro->last_name .' '. $pro->first_name;
            $pro_profession = Profession::find($pro->profession_id)->name;
            $pro_adresse = $pro->adresse;
            $pro_city = City::find($pro->city_id)->name_ville;
            $pro_phone = $pro->phone_number;

            // 2019-12-07_14
            $date = $appointment->data_tartempion;
            $date_day_hour_en = explode('_',$date);

            setlocale (LC_TIME, 'fr_FR','fra');
            $date_day_fr = utf8_encode(strftime('%A %d/%m/%Y', strtotime($date_day_hour_en[0])));
            $date_day_fr = ucfirst($date_day_fr);

            //print_r($date_day_fr);

            $date_hour = $date_day_hour_en[1];

            array_push($tab_day,$date_day_fr);
            array_push($tab_hour,$date_hour);

            array_push($tab_pro_name, $pro_name);
            array_push($tab_pro_profession, $pro_profession);
            array_push($tab_pro_adresse, $pro_adresse);
            array_push($tab_pro_city, $pro_city);
            array_push($tab_pro_phone, $pro_phone);
        }
        //dd($pro_profession);

        if($id == $user_id){
            return view('clientArea/index',[
                'user' => $user,
                'appointments' => $appointments,
                'tab_pro_name' => $tab_pro_name,
                'tab_pro_profession' => $tab_pro_profession,
                'tab_pro_adresse' => $tab_pro_adresse,
                'tab_pro_city' => $tab_pro_city,
                'tab_pro_phone' => $tab_pro_phone,
                'tab_day' => $tab_day,
                'tab_hour' => $tab_hour,
                ]);
        }else
            $request->session()->flash('status',"La page que vous recherchez n'existe pas");
            $request->session()->flash('alert-class',"alert-info");
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
            $request->session()->flash('status',"La page que vous recherchez n'existe pas");
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
        
        $data = [
            'last_name' => request('last_name'),
            'first_name' => request('first_name'),
            'email' => request('email'),
            'phone_number' => request('phone'),
            'adresse' => request('adresse'),
            // 'city_id' => null,
            'about' => request('about')
        ];

        //dd($request->input('city'));
        $user->city_id = null;
        if($request->input('city')){
            $city = $request->input('city');
            $city_input = City::where('name_ville',$city)->first();
            $city_id = $city_input->id;

            $user->city_id = $city_id;
        }
        
        
        $user->update($data);

        $request->session()->flash('status',"Vos informations personnelles ont bien été modifiées");
        $request->session()->flash('alert-class',"alert-success");
        return view('clientArea/index',[
            'user' => $user,
            ]);

    }
}
