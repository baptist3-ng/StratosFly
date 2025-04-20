<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Aeroport;
use App\Models\Reservation;
use App\Models\Passager;

class AdminController extends Controller
{
    public function index()
    {
        $aeroports = Aeroport::all(); // récupère tous les aéroports
        
        return view('admin.adminAction',['aeroports' => $aeroports]);
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

        return redirect()->route('admin.adminAction')->with('success','Le vol a bien été programmé !');
    }
    public function updateFlight(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:vols,id',
            'nouvel_aeroport_depart_id' => 'required|exists:aeroports,id',
            'nouvel_aeroport_arrivee_id' => 'required|exists:aeroports,id',
            'nouvelle_date_depart' => 'required|date',
            'nouvelle_date_arrivee' => 'required|date|after:nouvelle_date_depart',
            'nouveau_nb_places' => 'required|integer|min:1',
            'nouveau_prix' => 'required|numeric|min:0',
        ]);

        // Rechercher le vol par son ID
        $vol = Vol::find($request->id);

        // Verifier si le vol existe
        if (!$vol) {
            return redirect()->back()->with('error', 'Vol introuvable.');
        }

        //Vol trouvé, mise à jour
        $vol->update([
            'aeroport_depart_id' => $request->nouvel_aeroport_depart_id,
            'aeroport_arrivee_id' => $request->nouvel_aeroport_arrivee_id,
            'date_depart' => $request->nouvelle_date_depart,
            'date_arrivee' => $request->nouvelle_date_arrivee,
            'nb_places' => $request->nouveau_nb_places,
            'prix' => $request->nouveau_prix,
        ]);

        return redirect()->route('admin.adminAction')->with('success', 'Vol modifié avec succès !');
    }

    public function deleteFlight(Request $request)
    {
        $vol = Vol::find($request->id);

        if (!$vol) {
            return redirect()->back()->with('error', 'Vol introuvable.');
        }

        $vol->delete();

        return redirect()->route('admin.adminAction')->with('success', 'Vol supprimé avec succès !');
    }


    public function showAllReservations()
    {
        // Récupère toutes les réservations avec leurs passagers liés
        $reservations = Reservation::with(['passagers'])->get();
    
        return view('admin.reservationsList', ['reservations' => $reservations]);
    }

    public function showFlightInfo(Request $request)
    {
        
        // Rechercher le vol par son ID
        $vol = Vol::find($request->id);

        // Verifier si le vol existe
        if (!$vol) {
            return redirect()->back()->with('error', 'Vol introuvable.');
        }

        // Vol trouvé, afficher les informations
        return redirect()->route('admin.adminAction')->with('vol', $vol);
    }
}
