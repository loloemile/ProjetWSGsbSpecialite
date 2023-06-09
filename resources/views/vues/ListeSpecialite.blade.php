@extends('layouts.master')
@section('content')
    @if(Session::get('id')>0)
    <table class="table table-bordered table-striped table-responsive">

        <h1>Liste des spécialité du practicien {{$nomPraticien->nom_praticien}} </h1>
        <br/>
        <thead>
        <tr>
            <th style="width:10%">Spécialité</th>
            @if(Session::get('type')=='A')
            <th style="width:5%">Modifier</th>
            <th style="width:5%">Supprimer</th>
            @endif
        </tr>
        </thead>
        @foreach($mesSpePra as $uneSpe)
            <tr>
                <td> {{$uneSpe->lib_specialite}} </td>
                @if(Session::get('type')=='A')
                <td style="text-align:center;"><a href="{{url('/modifierSpe')}}/{{$uneSpe->id_specialite}}">
                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="VoirSpecialite"></span></a></td>
                <td style="text-align:center;"><a href="{{url('/supprimerSpe')}}/{{$uneSpe->id_specialite}}">
                        <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="VoirSpecialite"></span></a></td>
                @endif
            </tr>
        @endforeach
    </table>
    @if(Session::get('type')=='A')
    {!! Form::open(['url' => 'addSpecialite']) !!}
    <div class="col-md-12 well well-md">
        <center><h1>Ajout d'une spécialité</h1></center>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-3 control-label">Spécialité : </label>
                <div class="col-md-3">
                    <select class="form-control" name="idSpe" id="genre"  required>
                        <option value="0">Selectionner une spécilité</option>
                        @foreach($mesSpe as $uneSpe){
                        <option value="{{$uneSpe->id_specialite}}">{{$uneSpe->lib_specialite}}</option>
                        }
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-plus"></span> Ajout</button>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
            </div>
        </div>
    </div>
    @endif
    @endif
@stop

