<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vols()
    {
        return $this->belongsToMany(Vol::class, 'panier_vol');
    }
}
