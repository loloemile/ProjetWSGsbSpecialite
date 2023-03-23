@extends('layouts.master')
@section('content')
    @if(Session::get('type')=='A')
    {!! Form::open(['url' => 'modifSpe']) !!}
    <div class="col-md-12 well well-md">
        <center><h1>Modification spécialité</h1></center>
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
                    <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
            </div>
        </div>
    </div>
    @endif
@stop


