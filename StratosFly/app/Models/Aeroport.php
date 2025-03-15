<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aeroport extends Model
{
    // Relation avec les vols (aéroport de départ)
    public function volsDepart()
    {
        return $this->hasMany(Vol::class, 'aeroport_depart_id');
    }

    // Relation avec les vols (aéroport d'arrivée)
    public function volsArrivee()
    {
        return $this->hasMany(Vol::class, 'aeroport_arrivee_id');
    }
}
