@extends('layouts.master')
@section('content')
    <table class="table table-bordered table-striped table-responsive">

        <h1>Liste des Praticiens</h1>
        <thead>
        <tr>
            <th style="width:20%">Nom</th>
            <th style="width:20%">Prénom</th>
            <th style="width:20%">Ville</th>
            <th style="width:20%">Adresse</th>
            <th style="width:20%">Code Postale</th>
            <th style="width:20%">Voir les spécialités</th>
        </tr>
        </thead>
        @foreach($mesPraticiens as $unPraticien)
            <tr>
                <td> {{$unPraticien->nom_praticien}} </td>
                <td> {{$unPraticien->prenom_praticien}} </td>
                <td> {{$unPraticien->ville_praticien}} </td>
                <td> {{$unPraticien->adresse_praticien}} </td>
                <td> {{$unPraticien->cp_praticien}} </td>
                <td style="text-align:center;"><a href="{{url('/modifierFrais')}}/{{$unPraticien->id_praticien}}">
                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a></td>
            </tr>
        @endforeach
    </table>
@stop

