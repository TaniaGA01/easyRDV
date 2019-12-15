<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\City;
use App\Appointment;
use Image;
use App\Http\Requests\StoreNewAppointment;
use Auth;
use App\Rules\CityExists;

class ProfessionalAreaController extends Controller
{
    /**
     * Affiche la page "Mon agenda" du professionnel
     */
    public function indexAgenda(Request $request, $id){
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
            $request->session()->flash('icon',"fas fa-exclamation-triangle");
            $request->session()->flash('status',"La page que vous recherchez n'existe pas");
            $request->session()->flash('alert-class',"alert-info");
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
            $date_now = date('Y-m-d_H',strtotime('+1 hour'));
            // Mes activités
            $my_activities = Appointment::where('id_pro', $user_id)->whereNull('id_client')->orderBy('data_tartempion', 'asc')->get();

            $tab_id_activities = [];
            $tab_my_activities_content = [];
            $tab_my_activities_day = [];
            $tab_my_activities_tartempion = [];
            $tab_my_id_rdvs = [];

            foreach($my_activities as $my_activity){
                if($date_now <= $my_activity->data_tartempion){
                    array_push($tab_id_activities, $my_activity->id);
                    array_push($tab_my_activities_content, ucfirst($my_activity->content));
                    array_push($tab_my_activities_day,self::getDateHourFr($my_activity->data_tartempion));
                    array_push($tab_my_activities_tartempion,$my_activity->data_tartempion);
                    array_push($tab_my_id_rdvs,$my_activity->id);
                }
            }
            // Récupère que les 6 premiers
            $tab_id_activities = array_slice($tab_id_activities,0,6);
            $tab_my_activities_content = array_slice($tab_my_activities_content,0,6);
            $tab_my_activities_day = array_slice($tab_my_activities_day,0,6);
            $tab_my_activities_tartempion = array_slice($tab_my_activities_tartempion,0,6);
            $tab_my_id_rdvs = array_slice($tab_my_id_rdvs,0,6);

            // Prochains rendez-vous
            $rdvs = Appointment::where('id_pro', $user_id)->whereNotNull('id_client')->orderBy('data_tartempion', 'asc')->get();

            $tab_id_rdvs = [];
            $tab_clients_image = [];
            $tab_clients_name = [];
            $tab_clients_phone = [];
            $tab_clients_mail = [];
            $tab_my_rdv_day = [];
            $tab_data_tartempion = [];


            foreach($rdvs as $rdv){
                if($date_now <= $rdv->data_tartempion){
                    $id_client = $rdv->id_client;
                    $client = User::find($id_client);
                    $client_image = $client->image;
                    $client_name = $client->last_name .' '. $client->first_name;
                    $client_phone = $client->phone_number;
                    $client_email = $client->email;

                    array_push($tab_id_rdvs, $rdv->id);
                    array_push($tab_data_tartempion, $rdv->data_tartempion);

                    array_push($tab_my_rdv_day,self::getDateHourFr($rdv->data_tartempion));

                    array_push($tab_clients_image,$client_image);
                    array_push($tab_clients_name,$client_name);
                    array_push($tab_clients_phone,$client_phone);
                    array_push($tab_clients_mail,$client_email);
                }

                $tab_id_rdvs = array_slice($tab_id_rdvs,0,6);
                $tab_clients_image = array_slice($tab_clients_image,0,6);
                $tab_clients_name = array_slice($tab_clients_name,0,6);
                $tab_clients_phone = array_slice($tab_clients_phone,0,6);
                $tab_clients_mail = array_slice($tab_clients_mail,0,6);
                $tab_my_rdv_day = array_slice($tab_my_rdv_day,0,6);
                $tab_data_tartempion = array_slice($tab_data_tartempion,0,6);
            }
            //dd($tab_clients_name);
            return view('professionalArea/indexAppointment',[
                'user' => $user,
                //'my_activities' => $my_activities,
                'tab_id_activities' => $tab_id_activities,
                'tab_my_activities_content' => $tab_my_activities_content,
                'tab_my_activities_day' => $tab_my_activities_day,
                'tab_my_activities_tartempion' => $tab_my_activities_tartempion,
                'tab_my_id_rdvs' => $tab_my_id_rdvs,
                //'rdvs' => $rdvs,
                'tab_id_rdvs' => $tab_id_rdvs,
                'tab_clients_image' => $tab_clients_image,
                'tab_clients_name' => $tab_clients_name,
                'tab_clients_phone' => $tab_clients_phone,
                'tab_clients_mail' => $tab_clients_mail,
                'tab_my_rdv_day' => $tab_my_rdv_day,
                'tab_data_tartempion' => $tab_data_tartempion,
                ]);
        }else{
            $request->session()->flash('icon',"fas fa-exclamation-triangle");
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
    public function edit(Request $request,$id){
        $user = Auth::user();
        $user_id = $user->id;

        $cities = City::all();

        if($id == $user_id){
            return view('professionalArea/edit',[
                'user' => $user,
                'cities' => $cities
            ]);
        }else{
            $request->session()->flash('icon',"fas fa-exclamation-triangle");
            $request->session()->flash('status',"La page que vous recherchez n'existe pas");
            $request->session()->flash('alert-class',"alert-info");
            return view('welcome');
        }
    }

    /**
     * Modifie la page/formulaire "Mes informations personnelles" du professionnel
     */
    public function update(Request $request, $id){

        $user = User::find($id);
        $user_id = Auth::id();
        //dd($user);
        if($id == $user_id){
            request()->validate([
                // 'last_name' => 'required | min:3',
                // 'first_name' => 'required | min:3',
                'email' => 'required | email',
                'phone' => 'required',
                'adresse' => 'required',
                'city' => new CityExists
            ]);

            $city = $request->input('city');
            $city_input = City::where('name_ville',$city)->first();
            $city_id = $city_input->id;

            $data = [
                // 'last_name' => request('last_name'),
                // 'first_name' => request('first_name'),
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
            return redirect()->action('ProfessionalAreaController@indexAgenda', ['id' => $user_id]);
        }else{
            $request->session()->flash('icon',"fas fa-exclamation-triangle");
            $request->session()->flash('status',"Impossible de modifier cette entrée");
            $request->session()->flash('alert-class',"alert-danger");
            return view('welcome');
        }
    }

    /**
     * Update image Avatar
     */
    public function updateAvatar(Request $request){

        if($request->hasFile('avatar')){

            $user = Auth::user();

            $avatar = $request->file('avatar');
            $image_name = $user->first_name.'_'.$user->last_name.'_'.$user->profession->name.'_'.time().'.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/photos/' . $image_name ) );

            $user->image = $image_name;
            $user->save();
        }

        // return view('profile', array('user' => Auth::user()) );
        $cities = City::all();
        return view('professionalArea/edit',[
            'user' => $user,
            'cities' => $cities
        ]);
    }


    /**
     * Ajout d'un rdv dans l'agenda
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
     * Modification d'un rdv dans l'agenda
     */
    public function updateRdv(StoreNewAppointment $request, $id){

        $validated = $request->validated();

        $user_id = Auth::user()->id;
        $id_rdv = $request->input('id_rdv');
        $appointment = Appointment::find($id_rdv);

        if (isset($appointment)) {

            $appointment->fill($validated);

            if (($user_id==$appointment->id_pro) && $appointment->save()) {
                $request->session()->flash('status',"Rendez-vous modifié avec succès");
                $request->session()->flash('alert-class',"alert-success");
                return redirect()->action('ProfessionalAreaController@indexAgenda', ['id' => $user_id]);
            }
        }else {
            $request->session()->flash('status',"Impossible de modifier cette entrée");
            $request->session()->flash('alert-class',"alert-danger");
            return redirect()->action('ProfessionalAreaController@indexAgenda', ['id' => $user_id]);
        }
    }


    /**
     * Suppression d'un rdv dans l'agenda
     */
    public function deleteRdv(Request $request, $id){

        $user_id = Auth::user()->id;
        $id_rdv = $request->input('id_rdv');
        $appointment = Appointment::find($id_rdv);

        if ((isset($appointment)) && ($user_id==$appointment->id_pro) && $appointment->delete()) {
            $request->session()->flash('status',"Rendez-vous supprimé avec succès");
            $request->session()->flash('alert-class',"alert-success");
            return redirect()->action('ProfessionalAreaController@indexAgenda', ['id' => $user_id]);
        }else {
            $request->session()->flash('status',"Impossible de supprimer cette entrée");
            $request->session()->flash('alert-class',"alert-danger");
            return redirect()->action('ProfessionalAreaController@indexAgenda', ['id' => $user_id]);
        }
    }


    /**
     * Modification d'un rdv, page "Mes Rdvs"
     */
    public function updateAppointment(StoreNewAppointment $request, $id){

        $validated = $request->validated();

        $user_id = Auth::user()->id;
        $id_rdv = $request->input('id_rdv');
        $appointment = Appointment::find($id_rdv);
        $appointment->fill($validated);


        if (isset($appointment)) {

            $appointment->fill($validated);

            if (($user_id==$appointment->id_pro) && $appointment->save()) {
                $request->session()->flash('status',"Rendez-vous modifié avec succès");
                $request->session()->flash('alert-class',"alert-success");
                return redirect()->action('ProfessionalAreaController@indexAppointment', ['id' => $user_id]);
            }
        }else {
            $request->session()->flash('status',"Impossible de modifier cette entrée");
            $request->session()->flash('alert-class',"alert-danger");
            return redirect()->action('ProfessionalAreaController@indexAppointment', ['id' => $user_id]);
        }
    }


    /**
     * Suppression d'un rdv, page "Mes Rdvs"
     */
    public function deleteAppointment(Request $request, $id){

        $user_id = Auth::user()->id;
        $id_rdv = $request->input('id_rdv');
        $appointment = Appointment::find($id_rdv);

        if ((isset($appointment)) && ($user_id==$appointment->id_pro) && $appointment->delete()) {
            $request->session()->flash('status',"Rendez-vous supprimé avec succès");
            $request->session()->flash('alert-class',"alert-success");
            return redirect()->action('ProfessionalAreaController@indexAppointment', ['id' => $user_id]);
        }else {
            $request->session()->flash('status',"Impossible de supprimer cette entrée");
            $request->session()->flash('alert-class',"alert-danger");
            return redirect()->action('ProfessionalAreaController@indexAppointment', ['id' => $user_id]);
        }
    }

}
