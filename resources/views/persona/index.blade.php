@extends('adminlte::page')

@section('title', 'Encargados')

@section('content_header')
    <h2><strong>Listado de usuarios</strong></h2>
    @can('personas.create')
        <a href="personas\create" class="btn btn-primary btn-sm float-right"><h1>NUEVO</h1></a>
    @endcan
    <h2><strong>de Soporte Técnico</strong></h2>
@stop

@section('content')
<table id="personas" class="table table-striped table-bordered shadow-lg mt-1" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="cool">DNI</th>
            <th scope="cool">Nombre</th>
            <th scope="cool">Usuario</th>
            <th scope="cool">Contraseña</th>
            <th scope="cool">Cuenta</th>
            <th scope="cool">Acciones</th>
        </tr>
    </thead>
    <body>
        @foreach ($personas as $persona)
        <tr>
            <td>{{ $persona->DNI }}</td>
            <td>{{ $persona->name }}</td>
            <td>{{ $persona->usuario }}</td>
            <td>{{ $persona->contraseña }}</td>
            <td>
                @if( $persona->cuenta==1 )
                <a href="/personas/{{$persona->id}}/desabilitar" class="btn btn-info">Desabilitar</i></a>
                @else
                <a href="/personas/{{$persona->id}}/habilitar" class="btn btn-info">Habilitar</i></a>
                @endif
            </td>
            <td>
                <form action="{{ route ('personas.destroy', $persona->id) }}" method="POST">
                    @can('personas.edit')
                        <a href="/personas/{{$persona->id}}/edit" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('personas.destroy')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </body>
</table>
@stop

@section('css')
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://kit.fontawesome.com/0ff8f68011.js" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $('#personas').DataTable({
        "lengthMenu": [[5,10,50,-1], [5,10,50,"Todo"]]
    });
} );
</script>
@stop