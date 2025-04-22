<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){
        if (Auth::user()->role === 'Admin') {
            return redirect('admin');
        }
        $user = Auth::user();
        return view('account.home', ['user'=>$user]);
    }

    public function logout(){
        Auth::logout();
        return to_route('login');
    }
}
