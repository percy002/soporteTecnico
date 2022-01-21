@extends('adminlte::page')

@section('title', 'Mantenimientos')

@section('content')
<h1><strong>RECOJO DEL EQUIPO</strong></h1>

<form action="/mantenimientos/{{$mantenimientos->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 col-4">
        <label for="" class="form-label">Fecha de salida</label>
        <input id="salida" name="salida" type="date" value="{{ $fechas }}" class="form-control" tabindex="1" readonly>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Encargado</label>
        <input id="encargado" name="encargado" type="text" value="{{$mantenimientos->encargado}}" class="form-control" tabindex="2" readonly>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Equipo que se dara mantenimiento</label>
        <input id="equipo" name="equipo" type="text" class="form-control" value="{{ 'EQUIPO'.$caracteristicas->id .'|'. $equipos->tipo .'-'. $equipos->name }}" tabindex="3" readonly>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Persona que recoje el equipo</label>
        <input id="persona" name="persona" type="text" class="form-control" value="{{$trabajadores->name}}" tabindex="4" required>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">DNI de la persona</label>
        <input id="DNI" name="DNI" type="text" class="form-control" value="{{$trabajadores->DNI}}" tabindex="5" required>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Estado</label>
        @if ($mantenimientos->estado==1)
            <input id="estado" name="estado" type="text" class="form-control" value="OPERATIVO" tabindex="6" readonly>
        @else
            <input id="estado" name="estado" type="text" class="form-control" value="INOPERATIVO" tabindex="6" readonly>
        @endif
    </div>
    <a href="/mantenimientos" class="btn btn-secondary" tabindex="8">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop