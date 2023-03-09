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
            $lesFrais= DB::table('praticien')
                ->Select()
                ->get();
            return $lesFrais;
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
    }
}
