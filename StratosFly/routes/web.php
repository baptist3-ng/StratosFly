<?php

use App\Models\Aeroport;
use App\Models\Vol;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolController;

Route::get('/', function () {
    return view('home');
});


Route::get('/billets', [VolController::class, 'liste_vols']);
Route::post('/billets', [VolController::class, 'liste_filtree'])->name('vols.filter');



// Partie Administration


Route::get('/admin/edit', function (){
    $aeroports = Aeroport::all();
    $vols = Vol::all();

    return view('admin.edit', ['aeroports'=> $aeroports, 'vols'=> $vols]);
})->name('admin.edit'); // name sert d'allias

Route::post('/admin/add', [VolController::class,'ajout_vol'])->name('vols.ajout');
Route::post('/admin/delete', [VolController::class,'supprimer_vol'])->name('vols.supprime');

Route::get('/login', function () {
    return view('admin.login');
});