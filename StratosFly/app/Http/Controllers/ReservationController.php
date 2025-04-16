<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Passager;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    public function index(){
        $panier = Auth::user()->panier;
        return view('reserver',['panier'=>$panier]);
    }

    // Fonction pour afficher dans Voyageurs
    public function getVoyageur(){
        $panier = Auth::user()->panier;
        return view('account.reservation',['panier'=>$panier]); 
    }

    // Fonction pour reserver
    public function sendForm(Request $request){
        $vols_ids = $request->input('vols_ids'); // Je récupére les vols

        foreach ($vols_ids as $vol_id) {
            // Pour 1 passager
            $request->validate([
                "{$vol_id}_nom1" => 'required|string|min:2',
                "{$vol_id}_prenom1" => 'required|string|min:2',
                "{$vol_id}_nom2" => 'nullable|string|min:2',
                "{$vol_id}_prenom2" => 'nullable|string|min:2',
                "{$vol_id}_nom3" => 'nullable|string|min:2',
                "{$vol_id}_prenom3" => 'nullable|string|min:2',
                "{$vol_id}_nom4" => 'nullable|string|min:2',
                "{$vol_id}_prenom4" => 'nullable|string|min:2',
                "{$vol_id}_nom5" => 'nullable|string|min:2',
                "{$vol_id}_prenom5" => 'nullable|string|min:2',
            ]);


            // Compte les passagers
            $nb_passagers = 1;
            for ($i=2; $i < 5; $i++) { 
                if($request->filled("{$vol_id}_nom{$i}")){
                    $nb_passagers++;
                }
            }

            // Création de la reservation
            $reservation = new Reservation();
            $reservation->email = Auth::user()->email;
            $reservation->vol_id = $vol_id;
            $reservation->nb_passagers = $nb_passagers;
            $reservation->save();

            // Création et ajout des passagers
            for ($i=1; $i <= $nb_passagers; $i++) { 
                $passager = new Passager();
                $passager->nom = $request->input("{$vol_id}_nom{$i}");
                $passager->prenom = $request->input("{$vol_id}_prenom{$i}");
                $passager->genre = $request->input("{$vol_id}_p{$i}_genre");
                $passager->email = Auth::user()->email;
                $passager->save();

                $reservation->passager()->attach($passager);
            }
        }

        return redirect()->route('getBillets');
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
