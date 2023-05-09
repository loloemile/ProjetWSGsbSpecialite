<?php
namespace App\dao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ServiceVisiteur
{
    public function login($login, $pwd)
    {
        $connected = null;
        try {
            $visiteur = DB::table('visiteur')
                ->select()
                ->where('login_visiteur', '=', $login)
                ->first();
            if ($visiteur) {
                if (Hash::check($pwd, $visiteur->pwd_visiteur))  {
                    Session::put('id', $visiteur->id_visiteur);
                    Session::put('type', $visiteur->type_visiteur);
                    $connected = $visiteur;
                }
            }
        } catch (QueryException $e) {
            throw new MongoException($e->getMessage(), 5);
        }
        return $connected;
    }

    public function logout(){
        Session::put('id',0);
    }
}
