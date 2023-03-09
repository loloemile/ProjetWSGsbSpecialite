<?php

namespace App\Http\Controllers;

use App\dao\ServiceSpecialite;

class SpecialiteController
{
    public function getListeSpecialite($id){
        try {
            $monErreur="";
            $unServiceSpe= new ServiceSpecialite();
            $mesSpe= $unServiceSpe->GetSpeParPraticien($id);
            $titreVue="Modification d'une fiche de Frais";
            return view('vues/ListeSpecialite', compact('mesSpe', 'titreVue', 'monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }
}
