@extends('layouts.master')
@section('content')
    <table class="table table-bordered table-striped table-responsive">

        <h1>Liste des spécialité du practicien </h1>
        <br/>
        <thead>
        <tr>
            <th style="width:20%">Spécialité</th>
            <th style="width:20%">Modifier</th>
            <th style="width:20%">Suprimer</th>
        </tr>
        </thead>
        @foreach($mesSpe as $uneSpe)
            <tr>
                <td> {{$uneSpe->lib_specialite}} </td>
                <td style="text-align:center;"><a href="{{url('/getSpeParPraticien')}}/{{$uneSpe->id_praticien}}">
                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="VoirSpecialite"></span></a></td>
                <td style="text-align:center;"><a href="{{url('/getSpeParPraticien')}}/{{$uneSpe->id_praticien}}">
                        <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="VoirSpecialite"></span></a></td>
            </tr>
        @endforeach
    </table>
@stop

