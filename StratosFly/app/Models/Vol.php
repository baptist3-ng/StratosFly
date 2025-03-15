<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    // Relation avec l'aéroport de départ
    public function aeroportDepart()
    {
        return $this->belongsTo(Aeroport::class, 'aeroport_depart_id');
    }

    // Relation avec l'aéroport d'arrivée
    public function aeroportArrivee()
    {
        return $this->belongsTo(Aeroport::class, 'aeroport_arrivee_id');
    }
}
