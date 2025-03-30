<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function passager(){
        return $this->belongsToMany(Passager::class);
    }

    public function vol(){
        return $this->belongsTo(Vol::class);
    }
}
