<?php

namespace App\dao;

class ServiceSpecialite
{
    public function GetSpeParPraticien($id){
        try {
            $lesSpe= DB::table('specialite')
                ->Select()
                ->join('posseder', 'specialite.id_specialite','=','posseder.id_specialite')
                ->join('praticien','posseder.id_specialite','=','praticien.id_praticien')
                ->where('posseder.id_praticien','=',$id)
                ->orderBy('specialite.lib_specialite')
                ->get();
            return $lesSpe;
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }
}
