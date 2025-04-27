<?php

namespace App\Http\Controllers;

use App\Models\Aeroport;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $aeroports = Aeroport::all();

        return view('home', ['aeroports'=>$aeroports]);
    }
}
