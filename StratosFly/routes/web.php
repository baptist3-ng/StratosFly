<?php

use App\Models\Aeroport;
use App\Models\Vol;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
});


Route::get('/billets', [VolController::class, 'liste_vols']);
Route::post('/billets', [VolController::class, 'liste_filtree'])->name('vols.filter');


// Partie Utilisateur

Route::get('/account', [AccountController::class, 'index']);

// Partie Reservation
Route::get('/reserver', [ReservationController::class, 'index']);


// Partie Administration


Route::get('/admin/edit', function (){
    $aeroports = Aeroport::all();
    $vols = Vol::all();

    return view('admin.edit', ['aeroports'=> $aeroports, 'vols'=> $vols]);
})->name('admin.edit'); // name sert d'allias

Route::post('/admin/add', [VolController::class,'ajout_vol'])->name('vols.ajout');
Route::post('/admin/delete', [VolController::class,'supprimer_vol'])->name('vols.supprime');

Route::get('/login', [LoginController::class, 'indexLogin']);

Route::get('/accountCreation', [LoginController::class, 'indexRegister']);

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/accountCreation', [LoginController::class, 'register'])->name('register');

Route::get('/adminAction', [AdminController::class, 'index'])->name('admin.adminAction');

Route::post('/admin/flights/create', [AdminController::class,'registerFlight'])->name('vols.add');
Route::post('/admin/flights/update', [AdminController::class,'updateFlight'])->name('vols.update');
Route::post('/admin/flights/delete', [AdminController::class,'deleteFlight'])->name('vols.delete');
Route::post('/admin/flights/info', [AdminController::class,'showFlightInfo'])->name('vols.info');