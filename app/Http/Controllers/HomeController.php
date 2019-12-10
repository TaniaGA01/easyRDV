<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profession;
use App\User;
use App\City;
use App\Appointment;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Renvoie vers la page du professionnel, côté client.
     *
     */
    public function show($profession, $city, $first_name, $last_name)
    {
        $user = Auth::user();
        $result = User::where('last_name',str_replace('-', ' ', $last_name))->get();
        // return $result[0]->id;
        $rdvs = Appointment::where('id_pro', $result[0]->id)->get();
        return view('espacepro', [
            'pro' => $result,
            'user' => $user,
            'rdvs' => $rdvs,
        ]);
    }

    /**
     * Création des tableaux JSON pour l'autocomplétion
     *
     */
    public function tableau_1(){
        $pros = Profession::all();
        return response()->json($pros);
    }
    public function tableau_2(){
        $locs = City::all();
        return response()->json($locs);
    }
    public function tableau_3(){
        $locs = User::where('role_id','2')->get();
        return response()->json($locs);
    }

    /**
     * Effectue la recherche en page d'accueil, par profession et localisation
     *
     */
    public function search(Request $request){
        $loc = $request->input('locs');
        $name = str_replace(' ', '-', $request->input('pros'));
        $profession = Profession::where('name',$name)->get();
        $localisation = City::where('name_ville', $loc)->get();
        $nope = "Aucun résultat pour cette recherche.";
        if (!isset($localisation[0]->id) && isset($profession[0]->id)) {
            $id_profession = $profession[0]->id;
            $results = User::where('profession_id',$id_profession)->get();
            $tab_json = json_decode($results);
            if (empty($tab_json)) {
                return view('welcome', [
                    'nope' => $nope,
                ]);
            }elseif(isset($results)) {
                $us_profession = Profession::where('id',$results[0]->profession_id)->get();
                // $us_localisation = City::where('id', $results->city_id)->get();
                return view('welcome',[
                    'results'=> $results,
                    'job' => $us_profession
                ]);
            }
        } elseif (isset($profession[0]->id) && isset($localisation[0]->id)) {
            $id_profession = $profession[0]->id;
            $id_localisation = $localisation[0]->id;
            $results = User::where('profession_id',$id_profession)->where('city_id',$id_localisation)->get();
            $tab_json = json_decode($results);
            if (empty($tab_json)) {
                return view('welcome', [
                    'nope' => $nope,
                ]);
            }elseif(isset($results)) {
                $us_profession = Profession::where('id',$results[0]->profession_id)->get();
                $us_localisation = City::where('id', $results[0]->city_id)->get();
                return view('welcome',[
                    'results'=> $results,
                    'city' => $us_localisation,
                    'job' => $us_profession,
                ]);
            }
        }elseif (!isset($profession[0]->id) && isset($localisation[0]->id)) {
            $nope= "Vous devez sélectionner une profession !";
            return view('welcome', [
                'nope' => $nope,
            ]);
        }else {
            return view('welcome', [
                'nope' => $nope,
            ]);
        }
    }

    /**
     * Effectue la recherche en page d'accueil, par professionnels
     *
     */
    public function searchPro(Request $request){

        $id = $request->input('id-pro');
        $results = User::where('id',$id)->get();
        return $results;

    }
}
