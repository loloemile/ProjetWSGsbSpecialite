<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Exceptions\MonException;


class ServicePraticien
{
    public function getPraticien(){
        try {
            $lesPracticiens= DB::table('praticien')
                ->Select()
                ->orderBy('nom_praticien')
                ->get();
            return $lesPracticiens;
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getPraticienParId($NomPra){
        try {
            $lesPracticiens= DB::table('praticien')
                ->Select()
                ->where('nom_praticien','=',$NomPra)
                ->orderBy('nom_praticien')
                ->get();
            return $lesPracticiens;
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getPraParSpe($idSpe){
        try {
            $lesPra= DB::table('praticien')
                ->Select()
                ->join('posseder', 'posseder.id_praticien','=','praticien.id_praticien')
                ->join('specialite','posseder.id_specialite','=','specialite.id_specialite')
                ->where('specialite.id_specialite','=',$idSpe)
                ->orderBy('nom_praticien')
                ->get();
            return $lesPra;
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }
}
