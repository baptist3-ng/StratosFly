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


Route::get('/billets', [VolController::class, 'liste_vols'])->name('getBillets');
Route::post('/billets', [VolController::class, 'liste_filtree'])->name('vols.filter');


// Partie Utilisateur

Route::get('/account', [AccountController::class, 'index'])->middleware('auth')->name('account.home');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/accountCreation', function () {
    return view('admin.accountCreation');
});

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/accountCreation', [LoginController::class, 'register'])->name('register');
Route::delete('/logout', [AccountController::class, 'logout'])->name('logout');


// Panier
Route::post('/panier', [ReservationController::class, 'ajoutPanier'])->middleware('auth')->name('ajout.panier');
Route::post('/delete', [ReservationController::class, 'supprimerPanier'])->middleware('auth')->name('delete');



// Partie Reservation
Route::get('/panier', [ReservationController::class, 'index'])->middleware('auth')->name('getPanier');
Route::get('/reservation', [ReservationController::class, 'getVoyageur'])->middleware('auth')->name('reservation');
Route::post('/reservation', [ReservationController::class, 'sendForm'])->middleware('auth')->name('sendForm');
Route::get('/confirmation', [ReservationController::class, 'getConfirmation'])->middleware('auth')->name('confirmation');


// Partie Administration


Route::get('/admin/edit', function (){
    $aeroports = Aeroport::all();
    $vols = Vol::all();

    return view('admin.edit', ['aeroports'=> $aeroports, 'vols'=> $vols]);
})->name('admin.edit'); // name sert d'allias

Route::post('/admin/add', [VolController::class,'ajout_vol'])->name('vols.ajout');
Route::post('/admin/delete', [VolController::class,'supprimer_vol'])->name('vols.supprime');


