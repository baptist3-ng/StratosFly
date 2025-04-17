<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function indexLogin(){
        return view("admin.login");
    }
    
    public function indexRegister(){
        return view("admin.accountCreation");
    }
    public function authenticate(Request $request)
    {
        // Récupérer l'utilisateur via l'email
        $user = User::where('email', $request->email)->first();

        // Vérifier si l'utilisateur existe
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Cet e-mail ou ce mot de passe est incorrect.');
        }

        // Vérifier si l'utilisateur est un admin
        if($user -> role == "Admin"){
            return redirect("/adminAction");
        }

        // Authentification réussie
        return redirect('/myAccount');
    }
    public function register(Request $request)
    {
        $email = $request->input('email');

        // Vérifie si l'email existe déjà
        $existingUser = User::where('email', $email)->first();

        if ($existingUser) {
            // L'utilisateur existe déjà
            return back()->with('error', 'Un compte avec cet email existe déjà.');
        }

        // Création du compte
        User::insert([
            'name' => $request->input('name'),
            'prenom' => $request->input('prenom'),
            'email' => $email,
            'password' => Hash::make($request->input('password')),
            'genre' => $request->genre,
        ]);

        // Redirection vers la page de compte (ou de login)
        return redirect('/login')->with('success', 'Compte créé avec succès ! Connectez-vous.');
    }
}