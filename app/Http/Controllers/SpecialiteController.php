<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Exceptions\MonException;
use App\dao\ServiceSpecialite;

class SpecialiteController
{
    public function getListeSpecialite($id){
        try {
            $monErreur="";
            $unServiceSpe= new ServiceSpecialite();
            $mesSpe= $unServiceSpe->GetSpeParPraticien($id);
            $nomPraticien=$unServiceSpe->GetNom($id);
            return view('vues/ListeSpecialite', compact('mesSpe', 'nomPraticien', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function supprimerSpe($id_Spe){
        try {
            $erreur="";
            $unServiceSpe= new ServiceSpecialite();
            $unServiceSpe->deleteSpe($id_Spe);
            return redirect('/getListePraticiens');
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }
    public function modifSpe($id_Spe){
        try {
            $erreur="";
            $unServiceSpe= new ServiceSpecialite();
            $mesSpe=$unServiceSpe->getSpecialite($id_Spe);
            return view('vues/formSpecialite', compact('mesSpe','erreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function modifSpecialite(){
        try {
            $idPra=Session::get('id_praticien');
            $idSpe= Request::input('idSpe');
            $monErreur="";
            $unServiceSpe= new ServiceSpecialite();
            $unServiceSpe->modifSpe($idPra,$idSpe);
            $mesSpe= $unServiceSpe->GetSpeParPraticien($idPra);
            $nomPraticien=$unServiceSpe->GetNom($idPra);
            return view('vues/ListeSpecialite', compact('mesSpe', 'nomPraticien', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

}

