<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Passager extends Model
{
    public function user(){
        return $this->hasOne(User::class);
    }
}
