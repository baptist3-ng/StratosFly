<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;

// Accueil
Route::get('/', [HomeController::class, 'index']);

// Partie vols
Route::get('/billets', [VolController::class, 'liste_vols'])->name('getBillets');
Route::post('/billets', [VolController::class, 'liste_filtree'])->name('vols.filter');


// Partie Utilisateur
Route::get('/account', [AccountController::class, 'index'])->middleware('auth')->name('account.home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/accountCreation', [LoginController::class, 'getAccountCreation']);
Route::post('/accountCreation', [LoginController::class, 'register'])->name('register');

Route::delete('/logout', [AccountController::class, 'logout'])->name('logout');

Route::get('/informations', [AccountController::class, 'showInfos'])->name('user.infos')->middleware('auth');
Route::get('/informations/edit', [AccountController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::post('/informations/update', [AccountController::class, 'update'])->name('user.update')->middleware('auth');


// Panier
Route::post('/panier', [ReservationController::class, 'ajoutPanier'])->name('ajout.panier');
Route::post('/delete', [ReservationController::class, 'supprimerPanier'])->middleware('auth')->name('delete');



// Partie Reservation
Route::get('/panier', [ReservationController::class, 'index'])->middleware('auth')->name('getPanier');
Route::get('/panier/infos', [ReservationController::class, 'getInfos'])->middleware('auth')->name('panier.infos');
Route::get('/panier/passagers', [ReservationController::class, 'getPassagers']);
Route::post('/panier/passagers', [ReservationController::class, 'sendInfos'])->middleware('auth')->name('sendInfos');
Route::get('/panier/paiement', [ReservationController::class, 'getPaiement'])->name('panier.paiement');
Route::post('/panier/paiement', [ReservationController::class, 'sendForm'])->middleware('auth')->name('sendForm');



// Partie Administration

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.admin');

Route::post('/admin/flights/create', [AdminController::class,'registerFlight'])->middleware('auth')->name('vols.add');
Route::post('/admin/flights/update', [AdminController::class,'updateFlight'])->middleware('auth')->name('vols.update');
Route::post('/admin/flights/delete', [AdminController::class,'deleteFlight'])->middleware('auth')->name('vols.delete');
Route::get('/admin/reservations/all', [AdminController::class, 'showAllReservations'])->middleware('auth')->name('reservations.all');
Route::get('/admin/flights/info', [AdminController::class,'showFlightInfo'])->middleware('auth')->name('vols.info');
