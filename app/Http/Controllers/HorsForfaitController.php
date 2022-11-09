<?php

namespace App\Http\Controllers;

use App\dao\ServiceHorsForfait;
use App\metier\FraisHorsForfait;
use Request;
use Illuminate\Support\Facades\Session;
use App\metier\Frais;
use Exception;
use App\Exceptions\MonException;
use App\dao\ServiceFrais;

class HorsForfaitController extends Controller
{
    public function getFraisHorsForfaitVisiteur($id_frais){
        try {
            $erreur="";
            $unServiceHorsFrais= new ServiceHorsForfait();
            $mesHorsForfait= $unServiceHorsFrais->getFraisHorsForfait($id_frais);
            return view('vues/ListeFraisHorsForfait', compact('mesHorsForfait', 'erreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));

        }
    }

    public function updateFraisHorsForfait($id_fraisHorsForfait){
        try {
            $monErreur="";
            $unServiceFrais= new ServiceHorsForfait();
            $unFraisHorsForfait= $unServiceFrais->getById($id_fraisHorsForfait);
            $titreVue="Modification d'une fiche de Frais Hors forfait";
            return view('vues/formFraisHorsForfait', compact('unFraisHorsForfait', 'titreVue', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function validateFraisHorsForfait(){
        try {
            $id_fraishorsforfait= Request::input('id_fraisHorsForfait');
            $lib_fraishorsforfait=Request::input('lib_horsforfait');
            $montant_fraishorsforfait = Request::input('montanthorsforfait');
            $unServiceFrais= new ServiceHorsForfait();

            if($id_fraishorsforfait>0){
                $unServiceFrais->updateFraisHorsForfait($id_fraishorsforfait, $lib_fraishorsforfait, $montant_fraishorsforfait);
            }else{
                $unServiceFrais->insertFraisHorsForfait($lib_fraishorsforfait, $montant_fraishorsforfait);
            }
            $id_fais= Request::input('id_frais');
            return redirect('/getListeFraisHorsForfait/1');
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }
    public function addFraisHorsForfait(){
        try {
            $monErreur="";
            $unFraisHorsForfait=new FraisHorsForfait();
            $titreVue="Ajout d'une fiche de Frais hors forfait;";
            return view('vues/formFraisHorsForfait', compact('unFraisHorsForfait', 'titreVue', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function supprimeFraisHorsForfait($id_frais){
        try {

            $unServiceFrais= new ServiceHorsForfait();
            $unServiceFrais->deleteFraisHorsFrais($id_frais);
            return redirect('/getListeFraisHorsForfait/1');
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }
}
