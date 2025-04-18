<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Panier;
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
            return redirect()->route('login')->with('invalidLogin','Email ou mot de passe incorrect !');
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
        $user = User::create([
            'name' => $request->input('name'),
            'prenom' => $request->input('prenom'),
            'email' => $email,
            'password' => Hash::make($request->input('password')),
            'genre' => $request->input('genre'),
        ]);

        // Création du Panier de l'user
        if($user){
            $panier = new Panier();
            $panier->user()->associate($user);
            $panier->save();
        }

        // Redirection vers la page de compte (ou de login)
        return redirect('/login')->with('accountCreated', 'Compte créé avec succès ! Vous pouvez désormais vous connecter.');
    }
}