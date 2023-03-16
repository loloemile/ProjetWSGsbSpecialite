<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Exceptions\MonException;

class ServiceSpecialite
{
    public function GetSpeParPraticien($id){
        try {
            $lesSpe= DB::table('praticien')
                ->Select()
                ->join('posseder', 'posseder.id_praticien','=','praticien.id_praticien')
                ->join('specialite','posseder.id_specialite','=','specialite.id_specialite')
                ->where('posseder.id_praticien','=',$id)
                ->orderBy('specialite.lib_specialite')
                ->get();
            return $lesSpe;
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function GetNom($id){
        try {
            $nom= DB::table('praticien')
                ->Select('nom_praticien')
                ->where('id_praticien','=',$id)
                ->first();
            Session::put('id_praticien', $id);
            return $nom;
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function deleteSpe($id_Spe){
        try {
            DB::table('posseder')
                ->where('id_specialite', '=', $id_Spe)
                ->where('id_praticien','=',Session::get('id_praticien'))
                ->delete();
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }
}
