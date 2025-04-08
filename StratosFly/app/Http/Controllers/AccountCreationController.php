<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountCreationController extends Controller
{
    public function store(Request $request)
    {
        $email = $request->input('email');

        // Vérifie si l'email existe déjà
        $existingUser = DB::table('users_accounts')->where('email', $email)->first();

        if ($existingUser) {
            // L'utilisateur existe déjà
            return back()->with('error', 'Un compte avec cet email existe déjà.');
        }

        // Création du compte
        DB::table('users_accounts')->insert([
            'name' => $request->input('name'),
            'prenom' => $request->input('prenom'),
            'email' => $email,
            'password' => Hash::make($request->input('password')),
        ]);

        // Redirection vers la page de compte (ou de login)
        return redirect('/login')->with('success', 'Compte créé avec succès ! Connectez-vous.');
    }
}
