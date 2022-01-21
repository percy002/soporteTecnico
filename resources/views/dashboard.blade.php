@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
@stop

@section('content')

<div align="center">
    <img src="https://www.munisansebastian.gob.pe/wp-content/uploads/logo-mario-1.png" />
</div>
<br><br>
<div>
    <h1 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
        Municipalidad Distrital de San Sebasti&aacute;n
    </h1>
</div>
<br>
<table class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white" align="center">
        <tr>
            <th scope="cool">Direcci&oacute;n</th>
            <th scope="cool">Horario de atenci&oacute;n</th>
            <th scope="cool">Oficinas</th>
        </tr>
    </thead>
    <body>
        <td align="center">Plaza de Armas S/N <br> Distrito de San Sebastián</td>
        <td align="center"> 7:30 a.m. <br>a<br> 4:15 p.m.</td>
        <td align="center">Tr&aacute;mite Documentario
        <br>Caja
        <br>Impuesto Predial
        <br>Almac&eacute;n
        <br>Registro Civil</td>
    </body>
</table>
@stop

@section('css')
@stop

@section('js')
@stop