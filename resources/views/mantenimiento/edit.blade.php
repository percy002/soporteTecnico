@extends('adminlte::page')

@section('title', 'Mantenimientos')

@section('content')
<h1><strong>RECOJO DEL EQUIPO</strong></h1>

<form action="/mantenimientos/{{$mantenimiento->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 col-4">
        <label for="" class="form-label">Fecha de salida</label>
        <input id="salida" name="salida" type="date" value="{{ $fechas }}" class="form-control" tabindex="1" readonly>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Encargado</label>
        <input id="encargado" name="encargado" type="text" value="{{$mantenimiento->usuario->name}}" class="form-control" tabindex="2" readonly>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Equipo que se dara mantenimiento</label>
        <input id="equipo" name="equipo" type="text" class="form-control" value="{{ 'EQUIPO'.$mantenimiento->responsable_equipo->equipo->id .'|'. $mantenimiento->responsable_equipo->equipo->tipo .'-'. $mantenimiento->responsable_equipo->equipo->marca }}" tabindex="3" readonly>
    </div>

    {{-- <div class="mb-3 col-4">
        <label for="" class="form-label">Equipo que se dara mantenimiento</label>
        <select id="equipo" name="equipo" class="form-control selectpicker" data-live-search="true" tabindex="3" required>
            
                @foreach($responsable_equipos as $responsable_equipo)
                        <option value="{{$responsable_equipo->equipo->id}}">{{ 'EQUIPO'.$responsable_equipo->equipo->id." | ".$responsable_equipo->equipo->tipo." - ".$responsable_equipo->equipo->marca." | ".$responsable_equipo->responsable->nombre }}</option>
                    
                @endforeach
        </select>
    </div> --}}

    <div class="mb-3 col-4">
        <label for="" class="form-label">Persona que recoje el equipo</label>
        <input id="persona" name="persona" type="text" class="form-control" value="{{$mantenimiento->responsable_equipo->responsable->nombre}}" tabindex="4" required>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">DNI de la persona</label>
        <input id="DNI" name="DNI" type="text" class="form-control" value="{{$mantenimiento->responsable_equipo->responsable->dni}}" tabindex="5" required>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Estado</label>
        
            <input id="estado" name="estado" type="text" class="form-control" value="{{$mantenimiento->estado}}" tabindex="6" readonly>
        
    </div>
    <a href="/mantenimientos" class="btn btn-secondary" tabindex="8">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop