@extends('adminlte::page')

@section('title', 'Equipos')

@section('content_header')
<h2><strong>Listado de</strong></h2>
@can('equipos.create')
<a href="equipos\create" class="btn btn-primary btn-sm float-right"><h1>NUEVO</h1></a>
@endcan
<h2><strong>Equipos de Trabajo</strong></h2>
@stop

@section('content')
<table id="equipos" class="table table-striped table-bordered shadow-lg mt-1" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="cool">Codigo</th>
            <th scope="cool">Patrimonio</th>
            <th scope="cool">Equipo</th>
            <th scope="cool">Responsable</th>
            <th scope="cool">Area</th>
            <th scope="cool">Estado</th>
            <th scope="cool">Acciones</th>
        </tr>
    </thead>
    <body>
        @foreach ($responsable_equipos as $responsable_equipo)
        @php
            $equipo=$responsable_equipo->equipo
            
        @endphp
        <tr>
            
            <td>{{$equipo->id}}</td>
            <td>{{$equipo->patrimonio}}</td>
            <td>{{$equipo->tipo}}</td>
            <td>{{$responsable_equipo->responsable->nombre}}</td>
            <td>{{$responsable_equipo->responsable->area}}</td>
            <td>{{$equipo->estado}}</td>
            {{-- <td>{{ 'EQUIPO'.$caracteristica->id }}</td>
            <td>{{ $caracteristica->patrimonio }}</td>
            @foreach ($equipos as $equipo)
                @if($equipo->id==$caracteristica->marca)
                <td>{{ $equipo->name }}</td>
                @endif
            @endforeach
            @foreach ($trabajadores as $trabajadore)
                @if($trabajadore->id==$caracteristica->responsable)
                    <td>{{ $trabajadore->name }}</td>
                @endif
            @endforeach
            @foreach ($trabajadores as $trabajadore)
                @if($trabajadore->id==$caracteristica->responsable)
                    <td>{{ $trabajadore->lugar }}</td>
                @endif
            @endforeach
            
            <td> {{$separador[0]}} </td> --}}

            <td>
                <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST">
                    @can('equipos.edit')
                        <a href="/equipos/{{$equipo->id}}/edit" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('equipos.destroy')
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
    $('#equipos').DataTable({
        "lengthMenu": [[5,10,50,-1], [5,10,50,"Todo"]]
    });
} );
</script>
@stop