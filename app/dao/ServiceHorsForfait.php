<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Exceptions\MonException;


class ServiceHorsForfait
{
    public function getFraisHorsForfait($id_frais){
        try {
            $lesFrais= DB::table('fraishorsforfait')
                ->Select()
                ->where('id_frais', '=', $id_frais)
                ->get();
            return $lesFrais;
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getById($id_fraisHorsForfait){
        try {
            $lesFrais= DB::table('fraishorsforfait')
                ->Select()
                ->where('id_fraishorsforfait', '=', $id_fraisHorsForfait)
                ->first();
            return $lesFrais;
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function updateFraisHorsForfait($id_fraishorsforfait, $lib_fraishorsforfait, $montant_fraishorsforfait){
        try {
            DB::table('fraishorsforfait')
                ->where('id_fraishorsforfait', '=', $id_fraishorsforfait)
                ->update(['lib_fraishorsforfait'=> $lib_fraishorsforfait, 'montant_fraishorsforfait'=> $montant_fraishorsforfait]);
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function insertFraisHorsForfait($lib_fraishorsforfait, $montant_fraishorsforfait)
    {
        try {
            DB::table('fraishorsforfait')->insert(
                ['lib_fraishorsforfait' => $lib_fraishorsforfait,
                    'montant_fraishorsforfait' => $montant_fraishorsforfait,
                    'id_frais' => 1,
                    'date_fraishorsforfait' => '2018-09-12',
                    ]
            );
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }
    public function deleteFraisHorsFrais($id_frais){
        try {
            DB::table('fraishorsforfait')->where('id_fraishorsforfait', '=', $id_frais)->delete();
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }
}
