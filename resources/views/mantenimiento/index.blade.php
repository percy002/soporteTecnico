@extends('adminlte::page')

@section('title', 'Mantenimientos')

@section('content_header')
    @can('equipos.create')
    <a href="equipos\create" class="btn btn-primary btn-sm float-right"><h1>NUEVO</h1></a>
    @endcan
    <h2><strong>Listado de Mantenimiento</strong></h2>
    @can('mantenimientos.create')
    <a href="mantenimientos\create" class="btn btn-primary btn-sm float-right"><h1>MODIFICAR</h1></a>
    @endcan
    <h2><strong>de Equipos del Municipio</strong></h2>
@stop

@section('content')
<table id="mantenimientos" class="table table-striped table-bordered shadow-lg mt-1" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="cool">Codigo</th>
            <th scope="cool">Patrimonio</th>
            <th scope="cool">Equipo</th>
            <th scope="cool">Responsable</th>
            <th scope="cool">Area</th>
            <th scope="cool">Fecha de Entrada</th>
            <th scope="cool">Estado</th>
            <th scope="cool">Entregar</th>
            <th scope="cool">Acciones</th>
        </tr>
    </thead>
    <body>
        @foreach ($mantenimientos as $mantenimiento)
        <tr>
            <td>{{$mantenimiento->id}}</td>
            <td>{{$mantenimiento->responsable_equipo->equipo->patrimonio}}</td>
            <td>{{$mantenimiento->responsable_equipo->equipo->tipo}}</td>
            <td>{{$mantenimiento->responsable_equipo->responsable->nombre}}</td>
            <td>{{$mantenimiento->responsable_equipo->responsable->area}}</td>
            <td>{{$mantenimiento->fecha_entrada}}</td>

            @if (Auth::user()->rol == 'administrador')
            <td>
                {{-- {{ Auth::user()->roles }} --}}
                @if($mantenimiento->estado==1)
                <a href="/mantenimiento/{{$mantenimiento->id}}/desabilitar" class="btn btn-info">listo</i></a>
                @else
                <a href="/mantenimiento/{{$mantenimiento->id}}/habilitar" class="btn btn-info">pendiente</i></a>
                @endif
            </td>
            @else
                {{-- {{ Auth::user()->roles }} --}}
                @if ($mantenimiento->estado==1)
                <td>Listo</td>
                @else
                    <td>Pendiente</td>

                @endif
            @endif
            <td>
                @if (Auth::user()->rol == 'administrador')
                    @if($mantenimiento->entregado=="No entregado" && $mantenimiento->estado==1)
                        <a href="/mantenimiento/{{$mantenimiento->id}}/entregar" class="btn btn-info">Entregar equipo</i></a>
                    @else
                        ----------
                        {{-- <a href="/mantenimiento/{{$mantenimiento->id}}/habilitar" class="btn btn-info">pendiente</i></a> --}}
                    @endif
                @else
                    @if ($mantenimiento->entregado==0)
                        <td>Pendiente</td>
                    @else
                        <td>Entregado</td>
                    @endif
                @endif
            </td>
            <td>
                <form action="{{ route ('mantenimientos.destroy', $mantenimiento->id) }}" method="POST">
                    @can('mantenimientos.edit')
                        <a href="/mantenimientos/{{$mantenimiento->id}}/edit" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('mantenimientos.destroy')
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
    $('#mantenimientos').DataTable({
        "lengthMenu": [[5,10,50,-1], [5,10,50,"Todo"]]
    });
} );
</script>
@stop