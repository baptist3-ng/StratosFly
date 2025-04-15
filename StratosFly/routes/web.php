<?php

use App\Models\Aeroport;
use App\Models\Vol;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('home');
});


Route::get('/billets', [VolController::class, 'liste_vols']);
Route::post('/billets', [VolController::class, 'liste_filtree'])->name('vols.filter');


// Partie Utilisateur

Route::get('/account', [AccountController::class, 'index'])->middleware('auth')->name('account.home');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/accountCreation', function () {
    return view('admin.accountCreation');
});

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/accountCreation', [LoginController::class, 'register'])->name('register');
Route::post('/reserver', [ReservationController::class, 'ajoutPanier'])->name('reserver');
Route::post('/delete', [ReservationController::class, 'supprimerPanier'])->name('delete');

Route::delete('/logout', [AccountController::class, 'logout'])->name('logout');


// Partie Reservation
Route::get('/reserver', [ReservationController::class, 'index'])->middleware('auth')->name('getPanier');


// Partie Administration


Route::get('/admin/edit', function (){
    $aeroports = Aeroport::all();
    $vols = Vol::all();

    return view('admin.edit', ['aeroports'=> $aeroports, 'vols'=> $vols]);
})->name('admin.edit'); // name sert d'allias

Route::post('/admin/add', [VolController::class,'ajout_vol'])->name('vols.ajout');
Route::post('/admin/delete', [VolController::class,'supprimer_vol'])->name('vols.supprime');


