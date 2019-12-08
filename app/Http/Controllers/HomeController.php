<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        $result = User::where('last_name',str_replace('-', ' ', $last_name))->get();
        // return $result;
        return view('espacepro', [
            'pro' => $result,
        ]);
    }
}
