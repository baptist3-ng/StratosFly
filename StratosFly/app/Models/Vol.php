<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    // Les attributs qui vont êtres modifiés/créés
    // On utilise mass assignement (voir doc)
    protected $fillable = [
        'aeroport_depart_id', 
        'aeroport_arrivee_id', 
        'date_depart', 
        'date_arrivee', 
        'nb_places', 
        'places_totales',
        'prix'
    ];


    // Un vol appartient (belongsTo) à un aéroport départ & arrivée
    // Relation avec l'aéroport de départ
    public function aeroportDepart()
    {
        return $this->belongsTo(Aeroport::class);
    }

    // Relation avec l'aéroport d'arrivée
    public function aeroportArrivee()
    {
        return $this->belongsTo(Aeroport::class);
    }

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }

    public function paniers()
    {
        return $this->belongsToMany(Panier::class, 'panier_vol');
    }
}
