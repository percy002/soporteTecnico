@extends('reportes.layoutreportes')
@section('content')
<h3>
    Historial de Mantenimientos
</h3>
<table id="" class="table " style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="cool">N°</th>
            <th scope="cool">Patrimonio</th>
            <th scope="cool">Equipo</th>
            <th scope="cool">Responsable</th>
            <th scope="cool">Area</th>
            {{-- <th scope="cool">Encargado de Soporte</th> --}}

            <th scope="cool">Fecha de Entrada</th>
            <th scope="cool">Fecha de Entrega</th>
            {{-- <th scope="cool">Acciones</th> --}}
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
            {{-- <td>{{$mantenimiento->usuario->name}}</td> --}}
            <td>{{$mantenimiento->fecha_entrada}}</td>
            <td>{{$mantenimiento->fecha_entrega}}</td>
        </tr>
            
        @endforeach
            {{-- <td>
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
            </td> --}}
        
        {{-- @endforeach --}}
    </body>
</table>
@stop
@section('css')
    
@endsection
