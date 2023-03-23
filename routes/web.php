<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\FraisController;
use App\Http\Controllers\HorsForfaitController;
use App\Http\Controllers\PraticienController;
use App\Http\Controllers\SpecialiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/getlogin', [VisiteurController::class, 'getLogin']);

Route::post('/login', [VisiteurController::class, 'signIn']);

Route::get('/getLogout', [VisiteurController::class, 'signOut']);

Route::get('/getListePraticiens',[PraticienController::class, 'getPraticien']);

Route::get('/RecherchePraticiens',[SpecialiteController::class, 'RecherchePraticien']);

Route::get('/getSpeParPraticien/{id}', [SpecialiteController::class, 'getListeSpecialite']);

Route::get('/supprimerSpe/{id}',[SpecialiteController::class, 'supprimerSpe']);

Route::get('/modifierSpe/{id}',[SpecialiteController::class, 'modifSpe']);

Route::post('/modifSpe/',
    array(
        'uses'=> 'App\Http\Controllers\SpecialiteController@modifSpecialite',
        'as'=> 'modifierSpecialite',
    )
);

Route::post('/addSpecialite/',
    array(
        'uses'=> 'App\Http\Controllers\SpecialiteController@ajoutSpecialite',
        'as'=> 'addSpecialite',
    )
);

Route::post('/postRechercher/',
    array(
        'uses'=> 'App\Http\Controllers\SpecialiteController@RechercheSpeNom',
        'as'=> 'postRechercher',
    )
);
