@extends('layouts.master')
@section('content')
    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th style="width:60%">Libellé</th>
            <th style="width:60%">Montant</th>
            <th style="width:20%">Modifier</th>
            <th style="width:20%">Supprimer</th>
        </tr>
        </thead>
        @foreach($mesHorsForfait as $unHorsForfait)
            <tr>
                <td> {{$unHorsForfait->lib_fraishorsforfait}} </td>
                <td style="text-align: right"> {{$unHorsForfait->montant_fraishorsforfait}} </td>
                <td style="text-align:center;"><a href="{{url('/modifierFraisHorsForfait')}}/{{$unHorsForfait->id_fraishorsforfait}}">
                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a></td>
                <td style="text-align:center;">
                    <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="#"
                       onclick="javascript:if (confirm('Suppression confirmée ?')) {window.location='{{ url('/supprimerFraisHorsForfait') }}/{{$unHorsForfait->id_fraishorsforfait}}';}">
                    </a>
                </td>
            </tr>
        @endforeach
        <tr><th>Montant total</th>
            <input type="hidden" {{$Montant=0}}>
            @foreach($mesHorsForfait as $unHorsForfait)
               <input type="hidden" {{$Montant=$Montant+$unHorsForfait->montant_fraishorsforfait}} >

            @endforeach
        <td style="text-align: right"><strong class="right">{{$Montant}}</strong></td></tr>
    </table>
    <div>
    <button type="button" class="btn btn-default btn-primary"
            onclick="javascript: {window.location='{{ url('/ajouterFraisHorsForfait') }}';}">
        <span class="glyphicon glyphicon-plus"></span> Ajouter</button>
        <button type="button" class="btn btn-default btn-primary"
                onclick="javascript:if (confirm('Validation confirmée ?')) {window.location='{{ url('/ModifierFrais')}}/{{$Montant}}/{{1}}';}">
            <span class="glyphicon glyphicon-ok"></span> Valider</button>
    </div>
@stop

