<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('account.home');
        }else{
            return view('admin.login');
        }
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:4'
        ]);

        $creds = [
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ];

        if(Auth::attempt($creds)){
            $request->session()->regenerate();
            return redirect()->intended(route('account.home'));
        }else{
            return redirect()->route('login')->withErrors(['invalid'=>'Email ou mot de passe incorrect !']);
        }
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