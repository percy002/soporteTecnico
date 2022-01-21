@extends('adminlte::page')

@section('title', 'Mantenimientos')

@section('content')
<h1><strong>MANTENIMIENTO DE EQUIPOS INFORMATICOS</strong></h1>

<form action="/mantenimientos/{{$mantenimientos->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 col-4">
        <lavel for="" class="form-label">Fecha de entrada</label>
        <input id="entrada" name="entrada" type="date" value="{{$mantenimientos->entrada}}" class="form-control" tabindex="1">
    </div>
    <div class="mb-3 col-4">
        <lavel for="" class="form-label">Fecha de salida</label>
        <input id="salida" name="salida" type="date" value="{{$mantenimientos->salida}}" class="form-control" tabindex="2">
    </div>
    <div class="mb-3 col-4">
        <lavel for="" class="form-label">Encargado</label>
        <input id="entrada" name="entrada" type="date" value="{{$mantenimientos->encargado}}" class="form-control" tabindex="3">
    </div>
    <div class="mb-3 col-4">
        <lavel for="" class="form-label">Equipo que se dara mantenimiento</label>
        <input id="entrada" name="entrada" type="date" value="EQU.{{$mantenimientos->equipo}}" class="form-control" tabindex="4">
    </div>
    <div class="mb-3 col-4">
        <lavel for="" class="form-label">Problema</label>
        <textarea id="problema" name="problema" cols="100" rows="3" tabindex="5" required>{{$mantenimientos->problema}}</textarea>
    </div>
    <div class="mb-3 col-4">
        <lavel for="" class="form-label">Causa</label>
        <textarea id="causa" name="causa" cols="100" rows="3" tabindex="6">{{$mantenimientos->causa}}</textarea>
    </div>
    <div class="mb-3 col-4">
        <lavel for="" class="form-label">Solucion</label>
        <textarea id="solucion" name="solucion" cols="100" rows="3" tabindex="7">{{$mantenimientos->solucion}}</textarea>
    </div>
    <div class="mb-3 col-4">
        <lavel for="" class="form-label">Observacion</label>
        <textarea id="observacion" name="observacion" cols="100" rows="3" tabindex="8">{{$mantenimientos->observacion}}</textarea>
    </div>
    <div class="mb-3 col-4">
        <lavel for="" class="form-label">Estado</label>
        @if($mantenimientos->estado==1)
        <input id="entrada" name="entrada" type="date" value="OPERATIVO" class="form-control" tabindex="9">
        @else
        <input id="entrada" name="entrada" type="date" value="INOPERATIVO" class="form-control" tabindex="9">
        @endif
    </div>
    <a href="/mantenimientos" class="btn btn-secondary" tabindex="11">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="10">Guardar</button>
</form>
@stop