@extends('adminlte::page')

@section('title', 'Mantenimientos')

@section('content')
<h1><strong>REALIZANDO MANTENIMIENTO</strong></h1>

<form action="/mantenimientos" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 col-4">
        <label for="" class="form-label">Fecha de entrada</label>
        <input id="entrada" name="entrada" type="date" value="{{ $fechas }}" class="form-control" tabindex="1">
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Encargado del mantenimiento</label>
        <select id="encargado" name="encargado" class="form-control" tabindex="2" required>
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Equipo que se dara mantenimiento</label>
        <select id="equipo" name="equipo" class="form-control selectpicker" data-live-search="true" tabindex="3" required>
            
                @foreach($responsable_equipos as $responsable_equipo)
                    @if ($responsable_equipo->equipo->estado=="OPERATIVO")
                        
                    <option value="{{$responsable_equipo->equipo->id}}">{{ $responsable_equipo->equipo->tipo." - ".$responsable_equipo->equipo->marca." | ".$responsable_equipo->responsable->nombre }}</option>
                    @endif
                    
                @endforeach
        </select>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Problema</label>
        <textarea id="problema" name="problema" cols="100" rows="3" tabindex="4" required></textarea>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Causa</label>
        <textarea id="causa" name="causa" cols="100" rows="3" tabindex="5"></textarea>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Solucion</label>
        <textarea id="solucion" name="solucion" cols="100" rows="3" tabindex="6"></textarea>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Observacion</label>
        <textarea id="observacion" name="observacion" cols="100" rows="3" tabindex="7"></textarea>
    </div>
    {{-- <div class="mb-3 col-4">
        <label for="" class="form-label">Estado</label>
        <select id="estado" name="estado" class="form-control" tabindex="8" required>
            <option value=1 selected>OPERATIVO</option>
            <option value=0>INOPERATIVO</option>
        </select>
    </div> --}}
    <a href="/mantenimientos" class="btn btn-secondary" tabindex="10">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="9">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/valorespredeterminados-*.min.js"> </script>

@stop