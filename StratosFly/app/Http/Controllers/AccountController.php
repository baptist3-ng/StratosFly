<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('account.home_account', ['user'=>$user]);
    }

    public function logout(){
        Auth::logout();
        return to_route('login');
    }

    public function showInfos()
    {
        $user = Auth::user();

        return view('account.informations', ['user' => $user]);
    }
    public function edit()
    {
        $user = Auth::user();
        return view('account.edit_informations', ['user' => $user]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'genre' => 'required|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        $user->update([
            'name' => $request->input('name'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'genre' => $request->input('genre'),
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('user.infos')->with('success', 'Informations mises à jour !');
    }
}
