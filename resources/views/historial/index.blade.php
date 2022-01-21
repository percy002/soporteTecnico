@extends('adminlte::page')

@section('title', 'Historiales')

@section('content_header')
<h2><strong>Listado de Historial de</strong></h2>
<h2><strong>Mantenimientos del Municipio</strong></h2>
@stop

@section('content')
<table id="historiales" class="table table-striped table-bordered shadow-lg mt-1" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="cool">Codigo</th>
            <th scope="cool">Patrimonio</th>
            <th scope="cool">Equipo</th>
            <th scope="cool">Fecha de Entrada</th>
            <th scope="cool">Estado</th>
            <th scope="cool">Fecha de Salida</th>
            <th scope="cool">Acciones</th>
        </tr>
    </thead>
    <body>
        @foreach ($mantenimientos as $mantenimiento)
        <tr>
            @foreach ($caracteristicas as $caracteristica)
                @if($caracteristica->id==$mantenimiento->equipo)
                    <td>{{ 'EQUIPO'.$caracteristica->id }}</td>
                    <td>{{ $caracteristica->patrimonio }}</td>
                    @foreach ($equipos as $equipo)
                        @if($equipo->id==$caracteristica->marca)
                            <td>{{ $equipo->name }}</td>
                            <td>{{ $mantenimiento->entrada }}</td>
                            @if($caracteristica->estado==1)
                            <td>OPERATIVO</td>
                            @else
                            <td>INOPERATIVO</td>
                            @endif
                            <td>{{ $mantenimiento->salida }}</td>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <td>
                <form action="{{ route ('historiales.destroy', $mantenimiento->id) }}" method="POST">
                    @can('historiales.edit')
                        <a href="/historiales/{{$mantenimiento->id}}/edit" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('historiales.destroy')
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

<script>
$(document).ready(function() {
    $('#historiales').DataTable({
        "lengthMenu": [[20,50,100,-1], [20,50,100,"Todo"]]
    });
} );
</script>
@stop 