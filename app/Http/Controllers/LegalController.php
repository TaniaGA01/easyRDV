<?php
use App\Http\Controllers\LegalController;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    // Conttrol Mention Légal
   public function index(){
    return view('pages.informationsLegales');
    }
}
