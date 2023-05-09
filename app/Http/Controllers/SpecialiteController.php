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

            return json_encode($mesSpePra);
            //return view('vues/ListeSpecialite', compact('mesSpePra', 'nomPraticien','mesSpe', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }
    }
    public function getNomPraticien($id){
        try {
            $monErreur="";
            $unServiceSpe= new ServiceSpecialite();
            $nomPra= $unServiceSpe->GetNom($id);
            return json_encode($nomPra);

        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }
    }

    public function getSansSpePraticien($id){
        try {
            $monErreur="";
            $unServiceSpe= new ServiceSpecialite();
            $mesSpePra=$unServiceSpe->getSansSpecialite($id);
            return json_encode($mesSpePra);
            //return view('vues/ListeSpecialite', compact('mesSpePra', 'nomPraticien','mesSpe', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }
    }

    public function supprimerSpe($idPra,$id_Spe){
        try {
            $monErreur="";
            $unServiceSpecialite= new ServiceSpecialite();
            $unServiceSpecialite->deleteSpe($idPra,$id_Spe);
            $mesSpePra= $unServiceSpecialite->GetSpeParPraticien($idPra);
            $nomPraticien=$unServiceSpecialite->GetNom($idPra);
            $mesSpe=$unServiceSpecialite->getSansSpecialite($idPra);
            $SuppressionReussie="Suppression reussie";
            return json_encode($SuppressionReussie);
            //return view('vues/ListeSpecialite', compact('mesSpePra', 'mesSpe','nomPraticien', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }
    }
    public function modifSpe($id_Spe){
        try {
            $erreur="";
            $unServiceSpe= new ServiceSpecialite();
            $mesSpe=$unServiceSpe->getSpecialite($id_Spe);
            return json_encode($mesSpe);
            //return view('vues/formSpecialite', compact('mesSpe','erreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }
    }

    public function modifSpecialite(){
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $AjoutJson = json_decode($json);
            if ($AjoutJson != null) {
                $idPra = $AjoutJson->id_praticien;
                $idSpe = $AjoutJson->id_specialite;
                $newIdSpe= $AjoutJson->id_NewSpecialite;
                $unServiceSpecialite = new ServiceSpecialite();
                $unServiceSpecialite->modifSpe($idPra, $idSpe, $newIdSpe);
                $Modif = 'Modification reussie';
                return json_encode($Modif);
                //return view('vues/ListeSpecialite', compact('mesSpePra', 'mesSpe','nomPraticien', 'monErreur'));
            }
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }
    }

    public function ajoutSpecialite(){
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $AjoutJson = json_decode($json);
            if ($AjoutJson != null) {
                $idPra = $AjoutJson->id_praticien;
                $idSpe = $AjoutJson->id_specialite;
                $unServiceSpecialite = new ServiceSpecialite();
                $unServiceSpecialite->addSpe($idSpe, $idPra);
                $Ajout = 'Ajout reussie';
                return json_encode($Ajout);
                //return view('vues/ListeSpecialite', compact('mesSpePra', 'nomPraticien','mesSpe', 'monErreur'));
            }
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }
    }

    public function RecherchePraticien(){
        try {
            $monErreur="";
            $unServiceSpe= new ServiceSpecialite();
            $unServicePra= new ServicePraticien();
            $mesSpe=$unServiceSpe->getTouteSpecialite();
            $mesPra=$unServicePra->getPraticien();
            return json_encode($mesSpe);

            //return view('vues/formRechercherPra', compact('mesSpe', 'mesPra','monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }
    }

    public function RechercheSpe(){
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $AjoutJson = json_decode($json);
            if ($AjoutJson != null) {
                $idSpe = $AjoutJson->IdSpe;
                $unServicePra= new ServicePraticien();
                $mesPraticiens=$unServicePra->getPraParSpe($idSpe);
                //return view('vues/ListePraticien', compact('mesPraticiens', 'monErreur'));
                return json_encode($mesPraticiens);
                //return view('vues/ListeSpecialite', compact('mesSpePra', 'nomPraticien','mesSpe', 'monErreur'));
            }
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }
    }

    public function RechercheNom(){
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $AjoutJson = json_decode($json);
            if ($AjoutJson != null) {
                $nomPra = $AjoutJson->nom_praticien;
                $unServicePra= new ServicePraticien();
                $mesPraticiens=$unServicePra->getPraticienParNom($nomPra);
                //return view('vues/ListePraticien', compact('mesPraticiens', 'monErreur'));
                return json_encode($mesPraticiens);
                //return view('vues/ListeSpecialite', compact('mesSpePra', 'nomPraticien','mesSpe', 'monErreur'));
            }
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return json_encode($monErreur);
            //return view('vues/error', compact('monErreur'));
        }
    }
}

