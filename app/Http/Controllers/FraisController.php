<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use App\metier\Frais;
use Exception;
use App\Exceptions\MonException;
use App\dao\ServiceFrais;


class FraisController extends Controller
{
    public function getFraisVisiteur(){
        try {
            $erreur="";
            $monErreur= Session::get('monErreur');
            Session::forget('monErreur');
            $unServiceFrais= new ServiceFrais();
            $id_visiteur=Session::get('id');
            $mesFrais= $unServiceFrais->getFrais($id_visiteur);
            return view('Vues/ListeFrais', compact('mesFrais', 'erreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));

        }
    }

    public function updateFrais($id_frais){
        try {
            $monErreur="";
            $unServiceFrais= new ServiceFrais();
            $unFrais= $unServiceFrais->getById($id_frais);
            $titreVue="Modification d'une fiche de Frais";
            return view('vues/formFrais', compact('unFrais', 'titreVue', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function validateFrais(){
        try {
            $id_frais= Request::input('id_frais');
            $annemois=Request::input('anneemois');
            $nbjustificatifs = Request::input('nbjustificatifs');
            $unServiceFrais= new ServiceFrais();
            if($id_frais>0){
                $unServiceFrais->updateFrais($id_frais, $annemois, $nbjustificatifs);
            }else{
                $montant=Request::input('montant');
                $id_visiteur= Session::get('id');
                $unServiceFrais->inserFrais($annemois, $nbjustificatifs, $id_visiteur, $montant);
            }
            return redirect('/getListeFrais');
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function addFrais(){
        try {
            $monErreur="";
            $unFrais=new Frais();
            $titreVue="Ajout d'une fiche de Frais;";
            return view('vues/formFrais', compact('unFrais', 'titreVue', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function supprimeFrais($id_frais){
        try {
            $erreur="";
            $unServiceFrais= new ServiceFrais();
            $unServiceFrais->deleteFrais($id_frais);
            return redirect('/getListeFrais');
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function updateMontant($montant, $id_frais){
        try {
            $unServiceFrais= new ServiceFrais();
            $unServiceFrais->updateMontant($montant, $id_frais);
            return redirect('/getListeFrais');
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

}
