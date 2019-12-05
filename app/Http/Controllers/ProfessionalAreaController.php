<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfessionalAreaController extends Controller
{
    public function indexAgenda($name){
        $user_details = Auth::user();
        $user = User::find($user_details->id);
        // $name = $user_details->first_name;
        return view('professionalArea/indexAgenda',['user_details' => $user_details]);
    }
}
