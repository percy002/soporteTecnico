@extends('adminlte::page')

@section('content')
<h1>MODIFICAR TRABAJADOR</h1>

<form action="/personas/{{$personas->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 col-4">
        <label for="" class="form-label">Nombre(s) y Apellidos</label>
        <input id="name" name="name" type="text" class="form-control" value="{{$personas->name}}" tabindex="1" readonly />
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">DNI</label>
        <input id="DNI" name="DNI" type="text" class="form-control" value="{{$personas->dni}}" tabindex="2" readonly />
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Celular</label>
        <input id="celular" name="celular" type="text" class="form-control" value="{{$personas->celular}}" tabindex="3" required>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Usuario</label>
        <input id="usuario" name="usuario" type="email" value="{{$personas->email}}" class="form-control" tabindex="4" required>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Contraseña</label>
        <input id="contraseña" name="contraseña" type="text" value="" class="form-control" tabindex="5" required>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Rol</label>
        <select id="rol" name="rol" class="form-control" value="{{$personas->rol}}" tabindex="6" required>
            @if($personas->rol=="trabajador")
                <option value="trabajador" selected>Trabajador</option>
                <option value="administrador">Administrador</option>
            @else
                <option value="trabajador">Trabajador</option>
                <option value="administrador" selected>Administrador</option>
            @endif
        </select>
    </div>
    
    <a href="/personas" class="btn btn-secondary" tabindex="8">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop