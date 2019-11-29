<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profession;


class TemporaireSearch extends Controller
{
    public function search(){
        return view('temporaire');
    }

    public function tableau(){
        $pros = Profession::all();
        return response()->json($pros);
    }
}
