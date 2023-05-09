<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\FraisController;
use App\Http\Controllers\HorsForfaitController;
use App\Http\Controllers\PraticienController;
use App\Http\Controllers\SpecialiteController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return view('home');
});

Route::get('/getlogin', [VisiteurController::class, 'getLogin']);

Route::post('/login', [VisiteurController::class, 'signIn'])->middleware('cors');

Route::get('/getLogout', [VisiteurController::class, 'signOut']);

Route::get('/getNomPraticien/{id}',[SpecialiteController::class, 'getNomPraticien']);

Route::get('/getListePraticiens',[PraticienController::class, 'getPraticien']);

Route::get('/RecherchePraticiens',[SpecialiteController::class, 'RecherchePraticien']);

Route::get('/getSpeParPraticien/{id}', [SpecialiteController::class, 'getListeSpecialite']);

Route::get('/getSansSpeParPraticien/{id}', [SpecialiteController::class, 'getSansSpePraticien']);

Route::get('/supprimerSpe/{idPraticien}/{idSpecialite}',[SpecialiteController::class, 'supprimerSpe']);

Route::get('/modifierSpe/{id}',[SpecialiteController::class, 'modifSpe']);

Route::post('/modifSpe',
    array(
        'uses'=> 'App\Http\Controllers\SpecialiteController@modifSpecialite',
        'as'=> 'modifierSpecialite',
    )
)->middleware('cors');;

Route::post('/addSpecialite',
    array(
        'uses'=> 'App\Http\Controllers\SpecialiteController@ajoutSpecialite',
        'as'=> 'addSpecialite',
    )
)->middleware('cors');

Route::post('/postRechercherSpe',
    array(
        'uses'=> 'App\Http\Controllers\SpecialiteController@RechercheSpe',
        'as'=> 'postRechercherSpe',
    )
)->middleware('cors');

Route::post('/postRechercherNom',
    array(
        'uses'=> 'App\Http\Controllers\SpecialiteController@RechercheNom',
        'as'=> 'postRechercherNom',
    )
)->middleware('cors');
