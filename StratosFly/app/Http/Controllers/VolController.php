<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Aeroport;

class VolController extends Controller
{
    // Retourner tous les vols car l'utilisateur n'a pas filtré
    public function liste_vols()
    {
        // Permet de charger les relations associées à un aéroport, comme le nom par exemple directement
        // en 1 requête
        $vols = Vol::with(relations: ['aeroportDepart', 'aeroportArrivee'])->get();

        // Ne charge pas les infos des aéroports
        //$vols = Vol::all();

        $aeroports = Aeroport::all(); // Sélectionner les aeroports dispos
        return view('billets', ['vols'=> $vols, 'aeroports'=> $aeroports]);
    }

    public function liste_filtree(Request $request){
        $request->validate([
            'date-depart'=>'date|nullable',
            'date-arrivee'=>'date|nullable',
            'prix'=>'nullable|integer|min:10', // nullable !!!!!!! 
            'lieu-depart'=>'integer|nullable',
            'lieu-arrivee'=>'integer|nullable'
        ]);

        // Je vais construire ma query à partir des champs remplis
        $query = Vol::query();

        // whereDate regarde juste la date, pas l'heure
        if($request->filled('date-depart')){
            $query->whereDate('date_depart', '=',$request->input('date-depart'));
        }

        // whereDate regarde juste la date, pas l'heure
        if($request->filled('date-arrivee')){
            $query->whereDate('date_arrivee','=',$request->input('date-arrivee'));
        }

        if($request->filled('prix')){
            $query->where('prix', '<=', $request->input('prix'));
        }

        if($request->filled('lieu-depart')){
            $query->where('aeroport_depart_id', '=', $request->input('lieu-depart'));
        }

        if($request->filled('lieu-arrivee')){
            $query->where('aeroport_arrivee_id', '=', $request->input('lieu-arrivee'));
        }

        $vols = $query->get();

        //$vols = Vol::where('prix','<=', $request->input('prix'))->get();
        $aeroports = Aeroport::all();

        //return view('billets', ['vols'=> $vols]);
        return view('billets', ['vols'=> $vols, 'aeroports'=> $aeroports, 'billets'=>'billets']);
    }


    // Partie Administration
    public function ajout_vol(Request $request)
    {
        $request->validate([
            'aeroport_depart_id'=>'required|exists:aeroports,id',
            'aeroport_arrivee_id'=>'required|exists:aeroports,id|different:aeroport_depart_id',
            'date_depart'=>'required|date',
            'date_arrivee'=>'required|date|after:date_depart', //Logique pure
            'nb_places'=>'required|integer|min:1',
            'prix'=>'required|integer|min:10'
        ]);

        $created = Vol::create($request->all()); // assigne tous les attributs du form aux colonnes correspondantes
        // Il faut mettre protected fillable et harmoniser les noms
        // Il faut aussi un champ timestamp quand on créer la table

        if ($created) {
            return redirect()->route('admin.edit')->with('success', 'Le vol a été ajouté avec succès.');
        } else {
            return redirect()->route('admin.edit')->with('error', 'Erreur lors de l\'ajout  du vol.');
        }

    }

    public function supprimer_vol(Request $request){
        // Je vérifie si le vol existe
        $request->validate(['id'=>'required|integer|exists:vols,id']); 

        $id_vol = $request->input('id');
        
        $deleted = Vol::where('id','=', $id_vol)->delete();

        // On verfie si il n'y a pas eu d'erreur(s) lors de la suppression
        // Elle renvoie le nombre de vols supprimés
        if ($deleted) {
            return redirect()->route('admin.edit')->with('success', 'Le vol a été supprimé avec succès.');
        } else {
            return redirect()->route('admin.edit')->with('error', 'Erreur lors de la suppression du vol.');
        }
    }
}
