<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Passager;
use App\Models\Reservation;
use App\Models\Vol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    public function index(){
        $panier = Auth::user()->panier;
        $total = 0;

        // Prix total du panier
        foreach($panier->vols as $vol){
            $total += $vol->prix;
        }
        return view('account.panier',['panier'=>$panier, 'total'=>$total]);
    }

    // Fonction pour afficher dans Voyageurs
    public function getVoyageur(){
        $panier = Auth::user()->panier;
        return view('account.reservation',['panier'=>$panier]); 
    }

    // Fonction pour générer un id random
    public function generateRandom(){
        $date = date("Ymd");
        $rand = random_int(1000, 9999);
        return $date . $rand;
    }

    // Fonction pour reserver
    public function sendForm(Request $request){
        $vols_ids = $request->input('vols_ids'); // Je récupére les vols
        $reservations = [];

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
            for ($i=2; $i <= 5; $i++) { 
                if($request->filled("{$vol_id}_nom{$i}")){
                    $nb_passagers++;
                }
            }

            // Vérifie si on a assez de places
            $vol = Vol::find($vol_id);
            if ($vol->nb_places < $nb_passagers) {
                return redirect()->route('reservation')->withErrors(['insufisant'=>'Veuillez vérifier le nombre de places disponibles !']);
            }

            // Création de la reservation
            $reservation = new Reservation();
            $reservation->email = Auth::user()->email;
            $reservation->vol_id = $vol_id;
            $reservation->nb_passagers = $nb_passagers;
            $reservation->id_random = $this->generateRandom();
            $reservation->save();

            // Création et ajout des passagers
            for ($i=1; $i <= $nb_passagers; $i++) { 
                $passager = new Passager();
                $passager->nom = $request->input("{$vol_id}_nom{$i}");
                $passager->prenom = $request->input("{$vol_id}_prenom{$i}");
                $passager->genre = $request->input("{$vol_id}_p{$i}_genre");
                $passager->email = Auth::user()->email;
                $passager->save();

                $reservation->passagers()->attach($passager);
                $vol->nb_places--;
                $vol->save();
            }

            $reservations[] = $reservation; // Ajout de la réservation
        }

        //dd($reservations);

        $panier = Auth::user()->panier;
        $panier->vols()->detach();


        return redirect()->route('confirmation')->with('reservations', $reservations);
    }

    public function getConfirmation(){
        $reservations = session('reservations');

        return view('account.confirmation', ['reservations'=>$reservations]);
    }

    public function ajoutPanier(Request $request){
        if(Auth::user()){
            $vol_id = $request->input('vol_id'); // Récupère l'id du vol
            
            $panier = Auth::user()->panier;// relation // Je récupère le panier du l'user
            
            // Ajouter dans la table pivot + Vérification doublon
            if (!$panier->vols->contains($vol_id)) {
                $panier->vols()->attach($vol_id);
            }else{
                return redirect()->route('getPanier')->with('failAdd','Ce vol est déjà dans votre panier !');
            }

            return redirect()->route('getPanier')->with('successAdd','Vol ajouté au panier !');
        }else{
            session(['url.intended' => '/billets']);
            return redirect()->route('login')->with('loginRequired','Merci de bien vouloir vous connecter pour réserver.');
        }
    }

    public function supprimerPanier(Request $request){
        $vol_id = $request->input('panier_vol_id');

        $panier = Auth::user()->panier;// relation // Je récupère le panier du l'user
            
        $panier->vols()->detach($vol_id);
        return redirect()->route('getPanier')->with('successDel','Vol supprimé !');
    }
}
