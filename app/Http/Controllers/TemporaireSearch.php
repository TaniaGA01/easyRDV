<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profession;
use App\User;


class TemporaireSearch extends Controller
{
    public function search(){
        return view('temporaire');
    }

    public function tableau(){
        $jobs = Profession::all();
        $pros = User::all();
        $tab = [];
        array_push($tab, $jobs, $pros);
        return response()->json($tab);
        // $pros = Profession::all();
        // return response()->json($pros);
    }

    public function results($name){
        // $profession = Profession::find($name);
        $profession = Profession::where('name',$name)->get();
        $nope = "Aucun résultat pour cette recherche";

        if (isset($profession[0]->id)) {
            $id_profession = $profession[0]->id;
            $results = User::where('profession_id',$id_profession)->get();
            $tab_json = json_decode($results);
            if (empty($tab_json)) {
                return view('temporaire', [
                    'nope' => $nope,
                ]);
            }elseif(isset($results)) {
                return view('temporaire',[
                    'results'=> $results,
                ]);
            }
        }else {
            return view('temporaire', [
                'nope' => $nope,
            ]);
        }

    }
}
