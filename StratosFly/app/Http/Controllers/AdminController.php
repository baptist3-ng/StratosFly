<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Aeroport;
use App\Models\Reservation;
use App\Models\Passager;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'Admin') {
            echo "Acces refusé ! Espace réservé aux Administrateurs.";
            return;
        }
        $aeroports = Aeroport::all(); // récupère tous les aéroports
        $vols = Vol::all();
        
        return view('admin.admin',['aeroports' => $aeroports, 'vols'=>$vols]);
    }

    public function registerFlight(Request $request)
    {
        $request->validate([
            'aeroport_depart_id' => 'required|exists:aeroports,id',
            'aeroport_arrivee_id' => 'required|exists:aeroports,id',
            'date_depart' => 'required|date',
            'date_arrivee' => 'required|date|after:date_depart',
            'nb_places' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
        ]);

        // Création du vol
        $vol = Vol::create([
            'aeroport_depart_id' => $request->aeroport_depart_id,
            'aeroport_arrivee_id' => $request->aeroport_arrivee_id,
            'date_depart' => $request->date_depart,
            'date_arrivee' => $request->date_arrivee,
            'nb_places' => $request->nb_places,
            'prix' => $request->prix,
        ]);

        if (!$vol) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la programmation du vol.');
        }

        return redirect()->route('admin.admin')->with('volCreated','Le vol a bien été programmé !');
    }
    public function updateFlight(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:vols,id',
            'nouvel_aeroport_depart_id' => 'nullable',
            'nouvel_aeroport_arrivee_id' => 'nullable',
            'nouvelle_date_depart' => 'nullable',
            'nouvelle_date_arrivee' => 'nullable',
            'nouveau_nb_places' => 'nullable|integer|min:1',
            'nouveau_prix' => 'nullable|integer|min:10',
        ]);

        // Rechercher le vol par son ID
        $vol = Vol::find($request->input('id'));

        // Verifier si le vol existe
        if (!$vol) {
            return redirect()->back()->with('volNotFound', 'Vol introuvable.');
        }

        if ($request->filled('nouvel_aeroport_depart_id')) {
            $vol->aeroport_depart_id = $request->input('nouvel_aeroport_depart_id');
        }

        if ($request->filled('nouvel_aeroport_arrivee_id')) {
            $vol->aeroport_arrivee_id = $request->input('nouvel_aeroport_arrivee_id');
        }

        if ($request->filled('nouvelle_date_depart')) {
            $vol->date_depart = $request->input('nouvelle_date_depart');
        }

        if ($request->filled('nouvelle_date_arrivee')) {
            $vol->date_arrivee = $request->input('nouvelle_date_arrivee');
        }

        if ($request->filled('nouveau_nb_places')) {
            $vol->nb_places = $request->input('nouveau_nb_places');
        }

        if ($request->filled('nouveau_prix')) {
            $vol->prix = $request->input('nouveau_prix');
        }

        $vol->save();

        return redirect()->route('admin.admin')->with('volModified', 'Vol modifié avec succès !');
    }

    public function deleteFlight(Request $request)
    {
        $vol = Vol::find($request->input('id'));

        if (!$vol) {
            return redirect()->back()->with('volNotFound', 'Vol introuvable.');
        }

        if ($vol->reservation()->count() > 0) {
            return redirect()->back()->with('error', 'Impossible de supprimer : des réservations sont encore liées à ce vol.');
        }
        
        $vol->delete();

        return redirect()->route('admin.admin')->with('volDeleted', 'Vol supprimé avec succès !');
    }


    public function showAllReservations()
    {
        if (Auth::user()->role !== 'Admin') {
            echo "Acces refusé ! Espace réservé aux Administrateurs.";
            return;
        }
        // Récupère toutes les réservations avec leurs passagers liés
        $reservations = Reservation::all();
    
        return view('admin.reservationsList', ['reservations' => $reservations]);
    }

    public function showFlightInfo(Request $request)
    {
        if (Auth::user()->role !== 'Admin') {
            echo "Acces refusé ! Espace réservé aux Administrateurs.";
            return;
        }

        $aeroports = Aeroport::all(); // récupère tous les aéroports
        $vols = Vol::all();

        // Rechercher le vol par son ID
        $vol = Vol::find($request->input('id'));

        // Verifier si le vol existe
        if (!$vol) {
            return redirect()->back()->with('volNotFound', 'Vol introuvable.');
        }

        // Vol trouvé, afficher les informations
        return view('admin.admin',['vol_return'=>$vol, 'aeroports'=>$aeroports, 'vols'=>$vols]);
    }
}
