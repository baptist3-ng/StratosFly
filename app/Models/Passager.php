<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passager extends Model
{
    public function user(){
        return $this->hasOne(User::class);
    }

    public function reservation(){
        return $this->belongsToMany(Reservation::class);
    }
}
