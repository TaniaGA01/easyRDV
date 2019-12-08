<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profession;
use App\User;
use App\City;


class TemporaireSearch extends Controller
{
    public function search(){
        return view('temporaire');
    }

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

    public function results(Request $request){
        $loc = $request->input('locs');
        $name = str_replace(' ', '-', $request->input('pros'));
        $profession = Profession::where('name',$name)->get();
        $localisation = City::where('name_ville', $loc)->get();
        $nope = "Aucun résultat pour cette recherche.";
        if (empty($localisation) && isset($profession[0]->id)) {
            $id_profession = $profession[0]->id;
            $results = User::where('profession_id',$id_profession)->get();
            $tab_json = json_decode($results);
            if (empty($tab_json)) {
                return view('temporaire', [
                    'nope' => $nope,
                ]);
            }elseif(isset($results)) {
                $us_profession = Profession::where('id',$results[0]->profession_id)->get();
                // $us_localisation = City::where('id', $results->city_id)->get();
                return view('temporaire',[
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
                return view('temporaire', [
                    'nope' => $nope,
                ]);
            }elseif(isset($results)) {
                $us_profession = Profession::where('id',$results[0]->profession_id)->get();
                $us_localisation = City::where('id', $results[0]->city_id)->get();
                return view('temporaire',[
                    'results'=> $results,
                    'city' => $us_localisation,
                    'job' => $us_profession,
                ]);
            }
        }elseif (!isset($profession[0]->id) && isset($localisation[0]->id)) {
            $nope= "Vous devez sélectionner une profession !";
            return view('temporaire', [
                'nope' => $nope,
            ]);
        }else {
            return view('temporaire', [
                'nope' => $nope,
            ]);
        }
    }
}
