<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    protected $fillable = [
        'name',
        'prenom',
        'email',
        'password',
        'role',
        'genre'
    ];
}
