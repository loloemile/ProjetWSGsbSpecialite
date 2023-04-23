<?php

namespace App\Http\Controllers;
use App\dao\ServiceLogin;
use Request;
use App\metier\Visiteur;
use App\dao\ServiceVisiteur;
use Illuminate\Support\Facades\Session;

class VisiteurController extends Controller
{
    public function getLogin(){
        try {
            $erreur="";
            return view('vues/formLogin', compact('erreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        }
    }

    public  function signIn(){
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON
            $visiteurJson = json_decode($json);
            if ($visiteurJson != null) {
                $nom_visiteur = $visiteurJson->nom_visiteur;
                $pwd_visiteur = $visiteurJson->pwd_visiteur;
                $unService = new ServiceVisiteur();
                $connected = $unService->login($nom_visiteur, $pwd_visiteur);
                return json_encode($connected);
            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur);
        }
       /* try {
            $login= Request::input('login');
            $pwd= Request::input('pwd');
            $unVisiteur= new ServiceVisiteur();
            $connected= $unVisiteur->login($login, $pwd);

            if ($connected){
                if (Session::get('type')==='p'){
                    return view('vues/homePraticien');
                }else{
                    return view('home');
                }
            }else{
                $erreur= "Login ou mot de passe inconnu";
                return view('vues/formLogin', compact('erreur'));
            }
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        }catch (MonException $e){
            $monErreur= $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        }*/
    }

    public function signOut(){
        $unVisiteur= new ServiceVisiteur();
        $unVisiteur->logout();
        $connected="deconnecter";
        //return view('home');
        return json_encode($connected);
    }
}
