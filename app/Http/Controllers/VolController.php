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
        $vols = Vol::all();
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

        
        return view('billets', ['vols'=> $vols, 'aeroports'=> $aeroports, 'billets'=>'billets']);
    }
}
