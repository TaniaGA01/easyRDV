<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profession;

class ProfessionalController extends Controller
{
    public function create()
    {
        $professions = Profession::all();
        return view('professional/create',['professions' => $professions]);
    }
}
