<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // Récupère les données du formulaire
        $email = $request->input('email');
        $password = $request->input('password');

        // Requête vers la table 'users_accounts'
        $user = DB::table('users_accounts')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($user) {
            // Utilisateur trouvé
            return redirect('/myAccount');
        } else {
            // Utilisateur non trouvé
            return back()->with('error', 'Identifiants incorrects.');
        }
    }
}