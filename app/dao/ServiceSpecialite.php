<?php

namespace App\dao;

use App\metier\Specialite;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Exceptions\MonException;
use Illuminate\Database\Eloquent\Model;




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

    public function deleteSpe($id_pra, $id_Spe){
        try {
            DB::table('posseder')
                ->where('id_specialite', '=', $id_Spe)
                ->where('id_praticien','=',$id_pra)
                ->delete();
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }
    public function getSansSpecialite($id){
        try {
            /* $lesSpe= DB::table('specialite')
                 ->Select()
                 ->where('id_specialite','!=', $id_Spe)
                 ->get();
             Session::put('id_specialite', $id_Spe);
             return $lesSpe;

             return $specialites;*/
            $id_pra=$id;
            $lesSpe = DB::table('specialite')
                ->whereNotExists(function ($query) use ($id_pra) {
                    $query->select(DB::raw(1))
                        ->from('posseder')
                        ->whereRaw('specialite.id_specialite = posseder.id_specialite')
                        ->where('posseder.id_praticien', '=', $id_pra);
                })
                ->get();
            return $lesSpe;

        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getSpecialite($id_Spe){
        try {
           /* $lesSpe= DB::table('specialite')
                ->Select()
                ->where('id_specialite','!=', $id_Spe)
                ->get();
            Session::put('id_specialite', $id_Spe);
            return $lesSpe;

            return $specialites;*/
            $id_pra=Session::get('id_praticien');
            $lesSpe = DB::table('specialite')
                ->whereNotExists(function ($query) use ($id_pra) {
                    $query->select(DB::raw(1))
                        ->from('posseder')
                        ->whereRaw('specialite.id_specialite = posseder.id_specialite')
                        ->where('posseder.id_praticien', '=', $id_pra);
                })
                ->get();
            Session::put('id_specialite', $id_Spe);
            return $lesSpe;

        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getTouteSpecialite(){
        try {
            $lesSpe= DB::table('specialite')
                ->Select()
                ->get();
            return $lesSpe;
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }


    public function modifSpe($idPra,$idSpe,$NewIdSpe){
        try {
            DB::table('posseder')
                ->where('id_praticien', '=', $idPra)
                ->where('id_specialite','=',$idSpe)
                ->update(['id_specialite'=> $NewIdSpe]);
        }catch (QueryException $e){

            throw new MonException($e->getMessage(),5);
        }
    }

    public function addSpe($idPra, $idSpe)
    {
        try {
            DB::table('posseder')->insert(
                ['id_praticien' => $idSpe,
                    'id_specialite' => $idPra,
                    'diplome' => 'BAC+5',
                    'coef_prescription' => 8]
            );
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

}
