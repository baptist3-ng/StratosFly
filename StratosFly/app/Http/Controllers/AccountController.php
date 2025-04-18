<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
