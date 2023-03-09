<?php

namespace App\metier;

class Praticien
{
    protected  $table='specialite';
    public  $timestamps= false;
    protected $fillable=[
        'id_praticien',
        'id_type_praticien',
        'prenom_praticien',
        'adresse_praticien',
        'cp_praticien',
        'ville_praticien',
        'coef_notoriete'
    ];
}
