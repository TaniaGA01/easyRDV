<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\User;
use App\Appointment;
use App\Profession;
use Auth;
use Image;
// use Validator;
use App\Rules\CityExists;

class ClientAreaController extends Controller
{
    /**
     * Affiche la page "Mes rendez-vous" du client
     */
    public function index(Request $request, $id){

        $user = Auth::user();
        $user_id = $user->id;

        if($id == $user_id){
            // SELECT * FROM `appointments` WHERE id_client = 22
            // https://stackoverflow.com/questions/19325312/how-to-create-multiple-where-clause-query-using-laravel-eloquent
            $date_now = date('Y-m-d_H',strtotime('+1 hour'));

            $appointments = Appointment::where('id_client', $user_id)->get();
            //dd($appointments);
            // $tab_appointments = [
            //     ['nom prenom'],['profession'],['adresse'],['ville'],['téléphone'],[['date',['heure']]]
            // ];
            $tab_appointments = [];
            $tab_appointments_before = [];

            $i = 0;
            foreach($appointments as $appointment){
                if($date_now <= $appointment->data_tartempion){
                    $id_pro = $appointment->id_pro;
                    $pro = User::find($id_pro);
                    $pro_name = $pro->last_name .' '. $pro->first_name;
                    $pro_profession = Profession::find($pro->profession_id)->name;
                    $pro_address = $pro->adresse;
                    $pro_city = City::find($pro->city_id)->name_ville;
                    $pro_phone = $pro->phone_number;

                    $tab_appointments[$i]['id_rdv'] =  $appointment->id;
                    $tab_appointments[$i]['name'] =  $pro_name;
                    $tab_appointments[$i]['profession'] =  $pro_profession;
                    $tab_appointments[$i]['address'] =  $pro_address;
                    $tab_appointments[$i]['city'] =  $pro_city;
                    $tab_appointments[$i]['phone'] =  $pro_phone;
                    $tab_appointments[$i]['date'] = self::getDateHourFr($appointment->data_tartempion);
                    $tab_appointments[$i]['data_tartempion'] = $appointment->data_tartempion;
                    $i++;
                }else{
                    // select * from `appointments` where `id_client` = 22 group by `id_pro` order by `data_tartempion` desc
                    $appointments_before = Appointment::orderBy('data_tartempion','asc')->get()->where('id_client', $user_id)->groupBy('id_pro');
                    //dd($appointments_before);
                    $j = 0;
                    foreach($appointments_before as $appointment_before){

                        if($date_now > $appointment_before[0]->data_tartempion){
                            $id_pro_before = $appointment_before[0]->id_pro;
                            $pro_before = User::find($id_pro_before);
                            $pro_name_before = $pro_before->last_name .' '. $pro_before->first_name;
                            $pro_last_name_before = $pro_before->last_name;
                            $pro_first_name_before = $pro_before->first_name;
                            $pro_profession_before = Profession::find($pro_before->profession_id)->name;
                            $pro_address_before = $pro_before->adresse;
                            $pro_city_before = City::find($pro_before->city_id)->name_ville;
                            $pro_phone_before = $pro_before->phone_number;

                            $tab_appointments_before[$j]['name'] =  $pro_name_before;
                            $tab_appointments_before[$j]['last_name'] =  $pro_last_name_before;
                            $tab_appointments_before[$j]['first_name'] =  $pro_first_name_before;
                            $tab_appointments_before[$j]['profession'] =  $pro_profession_before;
                            $tab_appointments_before[$j]['address'] =  $pro_address_before;
                            $tab_appointments_before[$j]['city'] =  $pro_city_before;
                            $tab_appointments_before[$j]['phone'] =  $pro_phone_before;
                            $tab_appointments_before[$j]['date'] = self::getDateHourFr($appointment_before[0]->data_tartempion);
                            $j++;
                        }
                    }
                }
            }
            //dd($tab_appointments_before);
            $tab_appointments = array_slice($tab_appointments,0,6);
            $tab_appointments_before = array_slice($tab_appointments_before,0,6);
            return view('clientArea/index',[
                'user' => $user,
                'tab_appointments' => $tab_appointments,
                'tab_appointments_before' => $tab_appointments_before
                ]);
        }else{
            $request->session()->flash('status',"La page que vous recherchez n'existe pas");
            $request->session()->flash('alert-class',"alert-info");
            return view('welcome');
        }
    }

    /**
     * Retourne un tableau [0 => date, 1 => heure] à partir du champ "data_tartemption" (2019-12-13_8)
     */
    private function getDateHourFr($date){
        $tab_date_hour_fr = [];
        setlocale(LC_TIME, 'fr_FR','fra');
        $date_day_hour_en = explode('_',$date);
        $date_day_fr = utf8_encode(strftime('%A %d/%m/%Y', strtotime($date_day_hour_en[0])));
        $date_day_fr = ucfirst($date_day_fr);

        $date_hour = $date_day_hour_en[1];

        array_push($tab_date_hour_fr,$date_day_fr);
        array_push($tab_date_hour_fr,$date_hour);

        return $tab_date_hour_fr;
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
        $user_id = Auth::id();

        //dd($user);

        // #TODO champs requis ?
        request()->validate([
            // 'last_name' => 'required | min:3',
            // 'first_name' => 'required | min:3',
            'email' => 'required | email',
            'phone' => 'required',
            'city' => new CityExists
        ]);

        $data = [
            // 'last_name' => request('last_name'),
            // 'first_name' => request('first_name'),
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
        return redirect()->action('ClientAreaController@index', ['id' => $user_id]);
    }


    /**
     * Update image Avatar
     */
    public function updateAvatar(Request $request){

        if($request->hasFile('avatar')){

            $user = Auth::user();

            $avatar = $request->file('avatar');
            $image_name = $user->first_name.'_'.$user->last_name.'_'.time(). '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(null, 300, function ($constraint) {$constraint->aspectRatio();})
                                ->save( public_path('/uploads/photos/' . $image_name ) );

            $user->image = $image_name;
            $user->save();
        }

        // return view('profile', array('user' => Auth::user()) );
        $cities = City::all();
        return view('clientArea/edit',[
            'user' => $user,
            'cities' => $cities
        ]);
    }


    /**
     * Suppression d'un rdv, page "Mes Rdvs"
     */
    public function deleteAppointment(Request $request, $id){

        $user_id = Auth::user()->id;
        $id_rdv = $request->input('id_rdv');
        $appointment = Appointment::find($id_rdv);

        if ((isset($appointment)) && ($user_id==$appointment->id_client) && $appointment->delete()) {
            $request->session()->flash('status',"Rendez-vous supprimé avec succès");
            $request->session()->flash('alert-class',"alert-success");
            return redirect()->action('ClientAreaController@index', ['id' => $user_id]);
        }else {
            $request->session()->flash('status',"Impossible de supprimer cette entrée");
            $request->session()->flash('alert-class',"alert-danger");
            return redirect()->action('ClientAreaController@index', ['id' => $user_id]);
        }
    }

}
