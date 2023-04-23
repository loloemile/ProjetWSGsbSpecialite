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

Route::get('/getlogin', [VisiteurController::class, 'getLogin'])->middleware('cors');

Route::post('/login', [VisiteurController::class, 'signIn'])->middleware('cors');

Route::get('/getLogout', [VisiteurController::class, 'signOut']);

Route::get('/getNomPraticiens/{id}',[SpecialiteController::class, 'getNomPraticien'])->middleware('cors');

Route::get('/getListePraticiens',[PraticienController::class, 'getPraticien'])->middleware('cors');

Route::get('/RecherchePraticiens',[SpecialiteController::class, 'RecherchePraticien'])->middleware('cors');

Route::get('/getSpeParPraticien/{id}', [SpecialiteController::class, 'getListeSpecialite'])->middleware('cors');

Route::get('/getSansSpeParPraticien/{id}', [SpecialiteController::class, 'getSansSpePraticien'])->middleware('cors');

Route::get('/supprimerSpe/{idPraticien}/{idSpecialite}',[SpecialiteController::class, 'supprimerSpe'])->middleware('cors');

Route::get('/modifierSpe/{id}',[SpecialiteController::class, 'modifSpe'])->middleware('cors');

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

Route::post('/postRechercher',
    array(
        'uses'=> 'App\Http\Controllers\SpecialiteController@RechercheSpeNom',
        'as'=> 'postRecherche',
    )
)->middleware('cors');

