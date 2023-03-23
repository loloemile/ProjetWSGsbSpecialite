<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Specialite
{
    protected  $table='specialite';
    public  $timestamps= false;
    protected $fillable=[
        'id_specialite',
        'lib_specialite'
    ];


}
