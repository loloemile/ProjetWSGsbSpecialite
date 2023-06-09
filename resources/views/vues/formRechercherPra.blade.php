@extends('layouts.master')
@section('content')
    @if(Session::get('id')>0)
    <div>
        <h1 class="bvn"> Recherche de Pration  par Spécialité ou par Nom   </h1>
    </div>
    {!! Form::open(['url' => 'postRechercher']) !!}
    <div class="form-group">
        <div class="col-md-15">
            <label class="col-md-3 control-label" >Spécialité :</label>
            <select class="form-control" name="IdSpe"  required>
                <option value="0">Selectionner une spécialite</option>
                @foreach($mesSpe as $uneSpe){
                <option value="{{$uneSpe->id_specialite}}">{{$uneSpe->lib_specialite}}</option>
                }
                @endforeach
            </select>
        </div>
        <div>
            <div class="form-group">
                <label class="col-md-3 control-label">Nom : </label>
                <div class="col-md-15  col-md-15">
                    <input type="text" name="nom_praticien" class="form-control" placeholder="Nom du praticien">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <button type="submit" class="btn btn-default btn-primary">
                <span class="glyphicon glyphicon-ok"></span>Valider
            </button>
            &nbsp;
            <button type="button" class="btn btn-default btn-primary" onclick="javascript:if(confirm('vous êtes sûr?'))window.location='{{url('/')}}';">
                <span class="glyphicon glyphicon-remove"></span> Annuler</button>
        </div>
    </div>
    @endif
@stop
