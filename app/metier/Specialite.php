<?php

namespace App\metier;

class Specialite
{
    protected  $table='specialite';
    public  $timestamps= false;
    protected $fillable=[
        'id_specialite',
        'lib_specialite'
    ];
}
