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
        // return $profession;

        $id_profession = $profession[0]->id;

        // return $id_profession;

        $results = User::where('profession_id',$id_profession)->get();
        if (isset($results)) {
            return view('temporaire',[
                'results'=> $results,
            ]);
        }else {
            $nope = "Aucun résultat pour cette recherche";
            return view('temporaire', [
                'nope' => $nope,
            ]);
        }
    }
}
