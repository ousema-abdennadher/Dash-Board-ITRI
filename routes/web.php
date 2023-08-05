<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\DechetController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\VehiculeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(StaticController::class)->group(function(){
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    
    Route::get('/','login')->name('login');
    Route::post('/','loginAction')->name('login.action');

    Route::get('logout','logout')->middleware('auth')->name('logout');
});
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', [ChartController::class, 'chart'])->name('dashboard');

    
    Route::controller(StaticController::class)->group(function () {
        Route::get('/dashboard/admin', 'admin')->name('admin');
        Route::put('/dashboard/admin', 'update')->name('admin.update');
    });

    //acces a tous les livreurs pages 
    Route::controller(LivreurController::class)->group(function () {
        
        Route::get('/dashboard/livreur', 'livreur')->name('livreur');
        Route::get('/dashboard/livreure/edit/{id}', 'edit')->name('livreur.edit');
        Route::post('/dashboard/livreur/edit/{id}', 'update')->name('livreur.update');

        Route::get('/dashboard/livreur/avis/{id}', 'avis')->name('avis.livreur');
        Route::get('/dashboard/livreur/Conge/{id}', 'conge')->name('conge');
        Route::get('/dashboard/livreur/voiture/{id}', 'voiture')->name('voiture');
        Route::get('/dashboard/livreur/Locations/{id}', 'getLocation')->name('livreur.location');
        

        Route::get('/dashboard/ajouter_livreur', 'addlivreur')->name('addlivreur');
        Route::post('/dashboard/ajouter_livreur', 'add')->name('livreur.add');
    });

   




        //Route citoyen page
    Route::controller(CitoyenController::class)->group(function () {
        Route::get('/dashboard/citoyen', 'citoyen')->name('citoyen');
        Route::get('/dashboard/citoyen/tranferts/{id}','transfert')->name('transfert');
        Route::get('/dashboard/citoyen/message/{id}','message')->name('message');
        Route::get('/dashboard/citoyen/avis/{id}','avis')->name('avis.citoyen');
        Route::get('/dashboard/citoyen/location/{id}','location')->name('location');

    });




    //Route a vehicules pages 
    Route::controller(VehiculeController::class)->group(function () {

        Route::get('/dashboard/vehicule', 'vehicule')->name('vehicule');
        Route::get('/dashboard/vehicule/edit/{id}', 'edit')->name('vehicule.edit');
        Route::post('/dashboard/vehicule/edit/{id}', 'update')->name('vehicule.update');
        Route::get('/dashboard/vehicule/{id}', 'voiture')->name('voiture.car');



        Route::get('/dashboard/ajouter_vehicule', 'addvehicule')->name('addvehicule');
        Route::post('/dashboard/ajouter_vehicule', 'add')->name('vehicule.add');
    });

    //route  dechet pages
    Route::controller(DechetController::class)->group(function () {

        Route::get('/dashboard/dechet', 'dechet')->name('dechet');
        Route::get('/dashboard/dechet/edit/{id}', 'edit')->name('dechet.edit');
        Route::post('/dashboard/dechet/edit/{id}', 'update')->name('dechet.update');



        Route::get('/dashboard/ajouter_dechet', 'ajout_dechet')->name('ajout_dechet');
        Route::post('/dashboard/ajouter_dechet', 'add')->name('dechet.add');
    });
    Route::controller(RequestController::class)->group(function () {

        Route::get('/dashboard/demande', 'request')->name('request');
 
    }); 
    
});


