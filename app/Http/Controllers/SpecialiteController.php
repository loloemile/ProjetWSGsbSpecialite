<?php

namespace App\Http\Controllers;

use App\dao\ServicePraticien;
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
            $mesSpePra= $unServiceSpe->GetSpeParPraticien($id);
            $nomPraticien=$unServiceSpe->GetNom($id);
            $mesSpe=$unServiceSpe->getTouteSpecialite();
            return view('vues/ListeSpecialite', compact('mesSpePra', 'nomPraticien','mesSpe', 'monErreur'));
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
            $monErreur="";
            $idPra=Session::get('id_praticien');
            $unServiceSpecialite= new ServiceSpecialite();
            $unServiceSpecialite->deleteSpe($id_Spe);
            $mesSpePra= $unServiceSpecialite->GetSpeParPraticien($idPra);
            $nomPraticien=$unServiceSpecialite->GetNom($idPra);
            $mesSpe=$unServiceSpecialite->getTouteSpecialite();
            return view('vues/ListeSpecialite', compact('mesSpePra', 'mesSpe','nomPraticien', 'monErreur'));
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
            $mesSpePra= $unServiceSpe->GetSpeParPraticien($idPra);
            $nomPraticien=$unServiceSpe->GetNom($idPra);
            $mesSpe=$unServiceSpe->getTouteSpecialite();
            return view('vues/ListeSpecialite', compact('mesSpePra', 'mesSpe','nomPraticien', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function ajoutSpecialite(){
        try {
            $idSpe= Request::input('idSpe');
            $idPra= Session::get('id_praticien');
            $monErreur="";
            $unServiceSpecialite= new ServiceSpecialite();
            $unServiceSpecialite->addSpe($idSpe, $idPra);
            $mesSpePra= $unServiceSpecialite->GetSpeParPraticien($idPra);
            $nomPraticien=$unServiceSpecialite->GetNom($idPra);
            $mesSpe=$unServiceSpecialite->getTouteSpecialite();
            return view('vues/ListeSpecialite', compact('mesSpePra', 'nomPraticien','mesSpe', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function RecherchePraticien(){
        try {
            $monErreur="";
            $unServiceSpe= new ServiceSpecialite();
            $unServicePra= new ServicePraticien();
            $mesSpe=$unServiceSpe->getTouteSpecialite();
            $mesPra=$unServicePra->getPraticien();
            return view('vues/formRechercherPra', compact('mesSpe', 'mesPra','monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function RechercheSpeNom(){
        try {
            $monErreur="";
            $idSpe= Request::input('IdSpe');
            $NomPra= Request::input('idNomPra');
            $unServicePra= new ServicePraticien();
            if ($idSpe==0){
                $mesPraticiens=$unServicePra->getPraticienParId($NomPra);
                return view('Vues/ListePraticien', compact('mesPraticiens', 'monErreur'));
            }else{
                $mesPraticiens=$unServicePra->getPraParSpe($idSpe);
                return view('Vues/ListePraticien', compact('mesPraticiens', 'monErreur'));
            }

        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }
}

