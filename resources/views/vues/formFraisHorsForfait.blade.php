@extends('layouts.master')
@section('content')

    {!! Form::open(['url' => 'validerFraisHorsForfait'] ) !!}
    <div class="col-md-12  col-sm-12 well well-md">
        <center><h1> </h1></center>
        <div class="form-horizontal">
            <input type="hidden" name="id_fraisHorsForfait" value="{{$unFraisHorsForfait->id_fraishorsforfait ?? 0}}"/>
            <input type="hidden" name="id_frais" value="{{$unFraisHorsForfait->id_frais ?? 0}}"/>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Libellé : </label>
                <div class="col-md-2 col-sm-2">
                    <input type="text" name="lib_horsforfait" value="{{$unFraisHorsForfait->lib_fraishorsforfait ?? 0}} " class="form-control" placeholder="AAAAMM" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Montant : </label>
                <div class="col-md-2  col-sm-2">
                    <input type="number" step="0.01" name="montanthorsforfait" value="{{$unFraisHorsForfait->montant_fraishorsforfait ?? 0}}"  class="form-control" placeholder="Nombre de justificatifs" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript:if (confirm('Annulation confirmée ?')) {window.location='{{ url('/getListeFrais') }}';}">
                        <span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3  col-sm-6 col-sm-offset-3">

            </div>
        </div>
    </div>
