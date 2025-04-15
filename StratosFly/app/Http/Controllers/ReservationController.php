<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    public function index(){
        $panier = Auth::user()->panier;
        return view('reserver',['panier'=>$panier]);
    }

    public function ajoutPanier(Request $request){
        if(Auth::user()){
            $vol_id = $request->input('vol_id'); // Récupère l'id du vol
            
            $panier = Auth::user()->panier;// relation // Je récupère le panier du l'user
            
            // Ajouter dans la table pivot + Vérification doublon
            if (!$panier->vols->contains($vol_id)) {
                $panier->vols()->attach($vol_id);
            }

            //return view('/reserver', ['panier'=>$panier]);
            return redirect()->route('getPanier');
        }else{
            session(['url.intended' => '/billets']);
            return redirect()->route('login')->withErrors(['required'=>'Merci de bien vouloir vous connecter pour réserver.']);
        }
    }

    public function supprimerPanier(Request $request){
        $vol_id = $request->input('panier_vol_id');

        $panier = Auth::user()->panier;// relation // Je récupère le panier du l'user
            
        $panier->vols()->detach($vol_id);
        return redirect()->route('getPanier');
    }
}
