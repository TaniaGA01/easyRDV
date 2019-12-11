<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\City;
use App\Appointment;
use App\Http\Requests\StoreNewAppointment;
use Auth;

class EspaceProController extends Controller
{
     /**
     * Ajout d'un rdv
     */
    public function storeRdv(Request $request,$profession, $city, $first_name, $last_name){

        // $validated = $request->validated();
        // return $request;

        // TEMPORAIRE, J'ARRIVE PAS À UTILISER StoreNewAppointment...

        $newAppointment=new Appointment;
        // $newAppointment->fill($validated);
        $newAppointment->data_tartempion = $request->input('data_tartempion');
        $newAppointment->id_pro = $request->input('id_pro');
        $newAppointment->id_client = $request->input('id_client');

        if ($newAppointment->save()) {
            $request->session()->flash('status',"RDV enregistré avec succès");
            $request->session()->flash('alert-class',"alert-success");
            return redirect()->action('HomeController@show', [
                'profession' => $profession,
                'city' => $city,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ]);
        }

    }


    /**
     * Suppression d'un rdv
     */
    public function deleteRdv(Request $request,$profession, $city, $first_name, $last_name){

        $user_id = Auth::user()->id;
        $id_rdv = $request->input('id_rdv');
        $appointment = Appointment::find($id_rdv);

        if ((isset($appointment)) && ($user_id==$appointment->id_client) && $appointment && $appointment->delete()) {
            $request->session()->flash('status',"Rendez-vous supprimé avec succès");
            $request->session()->flash('alert-class',"alert-success");
            return redirect()->action('HomeController@show', [
                'profession' => $profession,
                'city' => $city,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ]);
        }else {
            $request->session()->flash('status',"Impossible de supprimer cette entrée");
            $request->session()->flash('alert-class',"alert-danger");
            return redirect()->action('HomeController@show', [
                'profession' => $profession,
                'city' => $city,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ]);
        }
    }
}
