<?php

namespace App\metier;

class Posseder
{
    protected  $table='posseder';
    public  $timestamps= false;
    protected $fillable=[
        'id_praticien',
        'id_specialite',
        'diplome',
        'coef_prescription'
    ];
}
