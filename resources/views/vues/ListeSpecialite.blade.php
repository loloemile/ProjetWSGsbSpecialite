@extends('layouts.master')
@section('content')
    <table class="table table-bordered table-striped table-responsive">

        <h1>Liste des Praticiens</h1>
        <br/>
        <thead>
        <tr>
            <th style="width:20%">Spécialité</th>
            <th style="width:20%">Modifier</th>
            <th style="width:20%">Suprimer</th>
        </tr>
        </thead>
        @foreach($mesPraticiens as $unPraticien)
            <tr>
                <td> {{$unPraticien->nom_praticien}} </td>
                <td> {{$unPraticien->prenom_praticien}} </td>
                <td> {{$unPraticien->ville_praticien}} </td>
                <td> {{$unPraticien->adresse_praticien}} </td>
                <td> {{$unPraticien->cp_praticien}} </td>
                <td style="text-align:center;"><a href="{{url('/getSpeParPraticien')}}/{{$unPraticien->id_praticien}}">
                        <span class="glyphicon glyphicon-check" data-toggle="tooltip" data-placement="top" title="VoirSpecialite"></span></a></td>
            </tr>
        @endforeach
    </table>
@stop

