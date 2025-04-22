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


// Panier
Route::post('/panier', [ReservationController::class, 'ajoutPanier'])->name('ajout.panier');
Route::post('/delete', [ReservationController::class, 'supprimerPanier'])->middleware('auth')->name('delete');



// Partie Reservation
Route::get('/panier', [ReservationController::class, 'index'])->middleware('auth')->name('getPanier');
Route::get('/reservation', [ReservationController::class, 'getVoyageur'])->middleware('auth')->name('reservation');
Route::post('/reservation', [ReservationController::class, 'sendForm'])->middleware('auth')->name('sendForm');
Route::get('/confirmation', [ReservationController::class, 'getConfirmation'])->middleware('auth')->name('confirmation');


// Partie Administration

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.admin');

Route::post('/admin/flights/create', [AdminController::class,'registerFlight'])->middleware('auth')->name('vols.add');
Route::post('/admin/flights/update', [AdminController::class,'updateFlight'])->middleware('auth')->name('vols.update');
Route::post('/admin/flights/delete', [AdminController::class,'deleteFlight'])->middleware('auth')->name('vols.delete');
Route::get('/admin/reservations/all', [AdminController::class, 'showAllReservations'])->middleware('auth')->name('reservations.all');
Route::get('/admin/flights/info', [AdminController::class,'showFlightInfo'])->middleware('auth')->name('vols.info');
