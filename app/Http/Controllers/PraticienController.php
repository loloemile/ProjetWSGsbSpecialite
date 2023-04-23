<?php

namespace App\Http\Controllers;


use Request;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Exceptions\MonException;
use App\dao\ServicePraticien;


class PraticienController extends Controller
{
    public function getPraticien(){
        try {
            $erreur="";
            $monErreur= Session::get('monErreur');
            Session::forget('monErreur');
            $unServicePraticien= new ServicePraticien();
            $mesPraticiens= $unServicePraticien->getPraticien();
            return json_encode($mesPraticiens);
           // return view('vues/ListePraticien', compact('mesPraticiens', 'erreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));

        }
    }




}
