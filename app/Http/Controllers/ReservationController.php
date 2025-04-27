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

    // Fonction pour afficher dans Informations
    public function getInfos(){
        $panier = Auth::user()->panier;
        $total = 0;

        // Prix total du panier
        foreach($panier->vols as $vol){
            $total += $vol->prix;
        }
        return view('account.infos',['panier'=>$panier, 'total'=>$total]);
    }

    public function getPassagers(){
        if(session()->has('details_vols')){
            // On récupère dans la session
            $details_vols = session('details_vols');
            $total = session('total');
            $prix_baggages = session('prix_baggages');
            $prix_hors_baggages = session('prix_hors_baggages');
            $panier = Auth::user()->panier;
            
            return view('account.passagers', ['details_vols'=>$details_vols,'total'=>$total,'panier'=>$panier, 'prix_baggages'=>$prix_baggages,'prix_hors_baggages'=>$prix_hors_baggages]);

        }else{
            return redirect()->route('getPanier');
        }
    }

    // Fonction pour sendInfos
    public function sendInfos(Request $request){
        $panier = Auth::user()->panier;
        $vols_ids = $request->input('vols_ids'); // Je récupére les vols
        $details_vols = []; // Tableau associatif
        $prix_hors_baggages = 0;
        $prix_baggages = 0;
        $total = 0;

        foreach($vols_ids as $vol_id){
            $vol = Vol::find($vol_id);
            $prix_billet = $vol->prix;

            $nb_billets = $request->input("{$vol_id}_nb_billets");
            $nb_baggages = $request->input("{$vol_id}_nb_baggages");
            $prix = $prix_billet * $nb_billets + 35 * $nb_baggages;

            $prix_hors_baggages += $prix_billet * $nb_billets;

            $prix_baggages += $nb_baggages * 35;

            $total += $prix;

            $details_vols[$vol_id] = [
                'vol'=>$vol,
                'nb_billets'=>$nb_billets,
                'nb_baggages'=>$nb_baggages,
                'prix'=>$prix
            ];
        }

        // Stockage en session
        session([
            'details_vols' => $details_vols,
            'prix_baggages' => $prix_baggages,
            'prix_hors_baggages' => $prix_hors_baggages,
            'total' => $total
        ]);

        return view('account.passagers', ['details_vols'=>$details_vols,'total'=>$total,'panier'=>$panier, 'prix_baggages'=>$prix_baggages,'prix_hors_baggages'=>$prix_hors_baggages]);
    }


    // Fonction pour générer un id random
    public function generateRandom(){
        $date = date("Ymd");
        $rand = random_int(1000, 9999);
        return $date . $rand;
    }

    // Fonction pour reserver
    public function sendForm(Request $request){
        $details_vols = session('details_vols'); // Je récupère en session
        $reservations = [];

        foreach ($details_vols as $vol_id => $details) {
            for($i = 1; $i <= $details['nb_billets']; $i++)
            $request->validate([
                "{$vol_id}_nom{$i}" => 'required|string|min:2',
                "{$vol_id}_prenom{$i}" => 'required|string|min:2',
            ]);

            // Vérifie si on a assez de places
            $vol = $details['vol'];
            if ($vol->nb_places < $details['nb_billets']) {
                return redirect()->route('reservation')->withErrors(['insufisant'=>'Veuillez vérifier le nombre de places disponibles !']);
            }

            // Les passagers du vols
            $passagers = [];
            for($i = 1; $i <= $details['nb_billets']; $i++){
                $passagers[] = [
                    'nom'=>$request->input("{$vol_id}_nom{$i}"),
                    'prenom'=>$request->input("{$vol_id}_prenom{$i}"),
                    'genre'=>$request->input("{$vol_id}_p{$i}_genre")
                ];
            }

            $reservations[] = [
                'vol_id'=>$vol_id,
                'nb_passagers'=>$details['nb_billets'],
                'id_random'=>$this->generateRandom(),
                'passagers'=>$passagers
            ];
             
        }
        
        session(['reservations' => $reservations]); // Stocke dans la session

        return redirect()->route('panier.paiement');
    }

    public function getPaiement(){
        if(session()->has('details_vols')){
            $panier = Auth::user()->panier;

            // On récupère dans la session
            $details_vols = session('details_vols');
            $total = session('total');
            $prix_baggages = session('prix_baggages');
            $prix_hors_baggages = session('prix_hors_baggages');

            return view('account.paiement',['details_vols'=>$details_vols,'total'=>$total,'panier'=>$panier, 'prix_baggages'=>$prix_baggages,'prix_hors_baggages'=>$prix_hors_baggages]);
        }else{
            return redirect()->route('getPanier');
        }
    }

    public function sendPayment(Request $request){
        $request->validate([
            'nom'=>'required|string|min:2',
            'prenom'=>'required|string|min:2',
            'email'=>'required|email',
            'chiffres'=>'required|digits:16',
            'date'=>'required',
            'cvv'=>'required|digits:3'
        ]);

        // Si le paiement réussi, on enregistre sur la table
        $reservations = session('reservations');

        foreach($reservations as $r){
            $vol = Vol::find($r['vol_id']);

            $reservation = new Reservation();
            $reservation->email = Auth::user()->email;
            $reservation->vol_id = $r['vol_id'];
            $reservation->nb_passagers = $r['nb_passagers'];
            $reservation->id_random = $r['id_random'];
            $reservation->save();

            // // Création et ajout des passagers
            foreach($r['passagers'] as $p) { 
                $passager = new Passager();
                $passager->nom = $p['nom'];
                $passager->prenom = $p['prenom'];
                $passager->genre = $p['genre'];
                $passager->email = Auth::user()->email;
                $passager->save();

                $reservation->passagers()->attach($passager);
                
            }

            $vol->nb_places -= $r['nb_passagers'];
            $vol->save();
        }

        // Clear le panier
        $panier = Auth::user()->panier;
        $panier->vols()->detach();

        // On récupère dans la session
        $details_vols = session('details_vols');
        $total = session('total');
        $prix_baggages = session('prix_baggages');
        $prix_hors_baggages = session('prix_hors_baggages');

        // Vide la session car j'en ai plus besoin
        session()->forget(['reservations', 'details_vols', 'total', 'prix_baggages', 'prix_hors_baggages']);

        //return redirect()->route('panier.confirmation');
        return view('account.confirmation', ['reservations'=>$reservations,'details_vols'=>$details_vols,'total'=>$total,'prix_baggages'=>$prix_baggages,'prix_hors_baggages'=>$prix_hors_baggages]);
    }

    public function getConfirmation(){
        return redirect()->route('getPanier');
    }

    public function ajoutPanier(Request $request){
        if(Auth::user()){
            if (Auth::user()->role === 'Admin') {
                return redirect()->route('admin.admin')->with('CantReserve', 'Erreur ! Pour pouvoir réserver, veuillez utiliser un utilisateur non admin.');
            }
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
