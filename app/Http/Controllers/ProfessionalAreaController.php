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
        $rdvs = Appointment::where('id_pro', $user_id)->get();

        if($id == $user_id){
            return view('professionalArea/indexAgenda',[
                'user' => $user,
                'rdvs' => $rdvs,
                ]);
        }else{
            return view('welcome');
        }
    }

     /**
     * Affiche la page "Mes rendez-vous" du professionnel 
     */
    public function indexAppointment(Request $request, $id){

        $user = Auth::user();
        $user_id = $user->id;
        if($id == $user_id){
            // https://stackoverflow.com/questions/36371796/laravel-eloquent-where-field-is-x-or-null/36372109
            $my_activities = Appointment::where('id_pro', $user_id)->whereNull('id_client')->orderBy('data_tartempion', 'asc')->get();
            //dd($my_activities);
            $tab_my_activities_content = [];
            $tab_my_activities_day = [];

            foreach($my_activities as $my_activity){
                $date_now = date('Y-m-d_H',strtotime('+1 hour'));
                if($date_now <= $my_activity->data_tartempion){
                     array_push($tab_my_activities_content, ucfirst($my_activity->content));
                     array_push($tab_my_activities_day,self::getDateHourFr($my_activity->data_tartempion));
                }
            }
            

            $rdvs = Appointment::where('id_pro', $user_id)->whereNotNull('id_client')->orderBy('data_tartempion', 'asc')->get();

            $tab_client_name = [];
            $tab_client_phone = [];
            $tab_client_mail = [];
            $tab_day = [];
            $tab_hour = [];

            foreach($rdvs as $rdv){
                $id_client = $rdv->id_client;
                $client = User::find($id_client);
                $client_name = $client->last_name .' '. $client->first_name;
                $client_phone = $client->phone_number;
                $client_email = $client->email;

                $date = $rdv->data_tartempion;
                $date_day_hour_en = explode('_',$date);

                setlocale (LC_TIME, 'fr_FR','fra');
                $date_day_fr = utf8_encode(strftime('%A %d/%m/%Y', strtotime($date_day_hour_en[0])));
                $date_day_fr = ucfirst($date_day_fr);

                $date_hour = $date_day_hour_en[1];

                array_push($tab_day,$date_day_fr);
                array_push($tab_hour,$date_hour);

                array_push($tab_client_name,$client_name);
                array_push($tab_client_phone,$client_phone);
                array_push($tab_client_mail,$client_email);
            }

            return view('professionalArea/indexAppointment',[
                'user' => $user,
                'my_activities' => $my_activities,
                'tab_my_activities_content' => $tab_my_activities_content,
                'tab_my_activities_day' => $tab_my_activities_day,
                'rdvs' => $rdvs,
                'tab_client_name' => $tab_client_name,
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
     * Transforme le champ data_tartempion "2019-12-13_08" en date anglais "2019-12-09 17:00:00.0 UTC" 
     * Return array
     */
    private function getDateEn($date_fr){
        $date_en = date_create_from_format('Y-m-d_H',$date_fr);
        return date_format($date_en,"Y/m/d H:i:s");
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
            'phone_number' => request('phone'),
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
    public function storeRdv(StoreNewAppointment $request, $id){

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

    /**
     * Modification d'un rdv
     */
    public function updateRdv(StoreNewAppointment $request, $id){

        $validated = $request->validated();

        $id_rdv = $request->input('id_rdv');
        $appointment = Appointment::find($id_rdv);
        $appointment->fill($validated);

        if ($appointment->save()) {
            $request->session()->flash('status',"Rendez-vous modifié avec succès");
            $request->session()->flash('alert-class',"alert-success");
            return redirect()->action('ProfessionalAreaController@indexAgenda', ['id' => $id]);
        }
    }


    /**
     * Suppression d'un rdv
     */
    public function deleteRdv(Request $request, $id){

        $id_rdv = $request->input('id_rdv');
        $appointment = Appointment::find($id_rdv);

        if ($appointment && $appointment->delete()) {
            $request->session()->flash('status',"Rendez-vous supprimé avec succès");
            $request->session()->flash('alert-class',"alert-success");
            return redirect()->action('ProfessionalAreaController@indexAgenda', ['id' => $id]);
        }
    }

}
