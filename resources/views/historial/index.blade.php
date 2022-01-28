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
            <th scope="cool">Responsable</th>
            <th scope="cool">Area</th>
            <th scope="cool">Fecha de Entrada</th>
            <th scope="cool">Fecha de Entrega</th>
            <th scope="cool">Acciones</th>
        </tr>
    </thead>
    <body>
        @foreach ($mantenimientos as $mantenimiento)
        <tr>
            @foreach ($mantenimientos as $mantenimiento)
        <tr>
            <td>{{$mantenimiento->id}}</td>
            <td>{{$mantenimiento->responsable_equipo->equipo->patrimonio}}</td>
            <td>{{$mantenimiento->responsable_equipo->equipo->tipo}}</td>
            <td>{{$mantenimiento->responsable_equipo->responsable->nombre}}</td>
            <td>{{$mantenimiento->responsable_equipo->responsable->area}}</td>
            <td>{{$mantenimiento->fecha_entrada}}</td>
            <td>{{$mantenimiento->fecha_entrega}}</td>
  
            
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