<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Frais extends Model
{
    protected  $table='frais';
    public  $timestamps= false;
    protected $fillable=[
        'id_frais',
        'id_etat',
        'anneemois',
        'id_visiteur',
        'nbjustificatifs',
        'montant_valide'
    ];

    public function __construct()
    {
        $this->id_frais=0;
    }
}
