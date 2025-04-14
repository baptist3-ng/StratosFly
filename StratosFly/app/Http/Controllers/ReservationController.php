<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(){
        return view('reserver');
    }

    public function ajoutPanier(){
        if(Auth::user()){
            return view('/reserver');
        }else{
            session(['url.intended' => url()->full()]);
            return redirect()->route('login')->withErrors(['required'=>'Merci de bien vouloir vous connecter pour réserver.']);
        }
    }
}
