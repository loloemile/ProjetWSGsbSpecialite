<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class FraisHorsForfait extends Model
{
    protected  $table='frais';
    public  $timestamps= false;
    protected $fillable=[
        'id_fraishorsforfait',
        'id_frais',
        'date_fraishorsforfait',
        'montant_fraishorsforfait',
        'lib_fraishorsforfait'
    ];
}
