@extends('adminlte::page')

@section('title', 'Mantenimientos')

@section('content_header')
    @can('equipos.create')
    <a href="equipos\create" class="btn btn-primary btn-sm float-right"><h1>Crear Equipo</h1></a>
    @endcan
    <h2><strong>Listado de Mantenimiento</strong></h2>
    @can('mantenimientos.create')
    <a href="mantenimientos\create" class="btn btn-primary btn-sm float-right"><h1>Crear Mantenimiento</h1></a>
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
            @if (!Auth::guest())
                <th scope="cool">Entregar</th>            
            @endif
            {{-- @can('mantenimientos.edit')
            <th scope="cool">Acciones</th>
            @endcan --}}
        </tr>
    </thead>
    <body>
        @foreach ($mantenimientos as $mantenimiento)
        <tr class="{{$mantenimiento->responsable_equipo->equipo->estado}}">
            <td>{{$mantenimiento->id}}</td>
            <td>{{$mantenimiento->responsable_equipo->equipo->patrimonio}}</td>
            <td>{{$mantenimiento->responsable_equipo->equipo->tipo}}</td>
            <td>{{$mantenimiento->responsable_equipo->responsable->nombre}}</td>
            <td>{{$mantenimiento->responsable_equipo->responsable->area}}</td>
            <td>{{$mantenimiento->fecha_entrada}}</td>
            
            {{-- @php
                
                dd(Auth::guest());
            @endphp
             --}}
             <td>
            @if (Auth::guest())
                @if ($mantenimiento->responsable_equipo->equipo->estado=="OPERATIVO")
                Listo
                @else
                Pendiente

                @endif
                
            
            @else
                @if($mantenimiento->responsable_equipo->equipo->estado=="OPERATIVO")
                <a href="/mantenimiento/{{$mantenimiento->id}}/desabilitar" class="btn btn-info">listo</i></a>
                @else
                <a href="/mantenimiento/{{$mantenimiento->id}}/habilitar" class="btn btn-info">pendiente</i></a>
                @endif
            @endif
            </td>

            @if (!Auth::guest())
            <td>
               

                
                    @if($mantenimiento->entregado=="No entregado" && $mantenimiento->responsable_equipo->equipo->estado=="OPERATIVO")
                    <a   id="{{'modalentrega'.$mantenimiento->id}}" class="btn btn-info modal-entrega" data-toggle="modal" data-target="{{'#modalentrega'.$mantenimiento->id}}"  >Entregar equipo</a>
                    @else
                        ----------
                        {{-- <a href="/mantenimiento/{{$mantenimiento->id}}/habilitar" class="btn btn-info">pendiente</i></a> --}}
                    @endif
                    
                </td>
                @endif

            {{-- @can('mantenimientos.edit')
                <td>
                    <form action="{{ route ('mantenimientos.destroy', $mantenimiento->id) }}" method="POST">
                            <a href="/mantenimientos/{{$mantenimiento->id}}/edit" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('mantenimientos.destroy')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                </td>
            @endcan --}}
        </tr>
        @include('mantenimiento.modal.entregarEquipo')
        @endforeach
    </body>
</table>


@stop

@section('css')
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{{ asset('css/style.css') }}}">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://kit.fontawesome.com/0ff8f68011.js" crossorigin="anonymous"></script>


<script>
$(document).ready(function() {
    $('#mantenimientos').DataTable({
        "lengthMenu": [[20,50,100,-1], [20,50,100,"Todo"]]
    });
} );
</script>
@stop