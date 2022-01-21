<style>
  table, th, td {
    border: 1px solid black;
  }
</style>

<table align="center" style="width: 700px">
    <tr >
      <th style="border: 0px"><h3 align="center"> MUNICIPALIDAD DE SAN SEBASTIAN</h3>
      <h3 align="center"> OFICINA DE TECNOLOGIAS Y SISTEMAS INFORMATICOS</h3>
      <h3 align="center"> FORMATO DE ATENCION DE SOPORTE TECNICO </h3></th>
      <th style="border: 0px">  <img src="http://www.munisansebastian.gob.pe/wp-content/uploads/logo-mario-1.png" style="width: 300px "> </th>
    </tr>

  </table>
  <table align="center" style="width: 700px">
    <tr>
      <th align="left">Fecha de Entrega: {{ $datos[5]->entrada }}</th>
      <th align="left">Fecha de Recepcion: {{ $datos[7] }}</th>
      <th align="left">Numero de Reporte: {{ $datos[6] }}</th>
    </tr>
  </table>
  <table  align="center" style="width: 700px">
    <tr align="center"><th>Datos del Usuario</th></tr>
  </table>
  <table align="center" style="width: 700px">
    <tr align="left">
      <th STYLE="width: 440px"> Nombre: {{ $datos[1]->name }} </th>
      <th style="alignment: left; width: 200px;  height: 20px"> DNI: {{ $datos[1]->DNI }} </th>
    </tr>
    <tr align="left" valign="top">
      @if($datos[1]->obs==null)
      <th style="height: 80PX"> Gerencia, Subgerencia, oficina: <br> {{ $datos[1]->lugar }} </th>
      @else
      <th style="height: 80PX"> Gerencia, Subgerencia, oficina: <br> {{ $datos[1]->lugar.' | '.$datos[1]->observacion }} </th>
      @endif
      <th style="height: 80PX"> Firma y sello:   </th>
    </tr>
  </table>
  <table align="center" style="width: 700px">
    <tr align="center"><th>Datos Del Tecnico del soporte</th></tr>
  </table>
  <table align="center" style="width: 700px">
    <tr align="left">
      <th STYLE="child-align: right;  width: 440px"> Nombre: {{ $datos[5]->encargado }} </th>
      <th style="alignment: left; width: 200px;  height: 20px"> Celular: {{ $datos[5]->celular }}  </th>
    </tr>
    <tr  align="left" valign="top">
      <th style="height: 80PX"> Area: <br> OFICINA DE TECNOLOGIAS Y SISTEMAS INFORMATIVOS </th>
      <th style="height: 80PX"> Firma y sello: <label></label></th>
    </tr>
  </table>
  <table align="center" style="width: 700px">
    <tr align="center"><th>DESCRIPCION DE EQUIPOS</th></tr>
  </table>
  <table align="center" style="width: 700px">
    <tr>
      <th> Nombre del equipo </th>
      <th> Marca y Modelo </th>
      <th> Sistema Operativo </th>
      <th> Procesador </th>
      <th> M. RAM </th>
      <th> Disco Duro </th>
      <th> IP </th>
      <th> Codigo Patrimonial </th>
    </tr>
    @foreach($datos[4] as $mantenimiento)
    @foreach($datos[3] as $caracteristica)
    @if($mantenimiento->equipo==$caracteristica->id)
      @foreach($datos[0] as $equipo)
        @if($caracteristica->marca==$equipo->id)
          @if($equipo->tipo=="CPU" or $equipo->tipo=="LAPTOP")
            <tr>
              <th> {{$equipo->tipo}} </th>
              <th> {{$equipo->name}} </th>
              <th> {{$caracteristica->sistema}} </th>
              <th> {{$caracteristica->procesador}} </th>
              <th> {{$caracteristica->RAM}} </th>
              <th> {{$caracteristica->disco}} </th>
              <th> {{$caracteristica->red}} </th>
              <th"> {{$caracteristica->patrimonio}} </th>
            </tr>
          @endif  
        @endif
      @endforeach
    @endif
    @endforeach
    @endforeach
    <tr STYLE="height: 20px">
      <th> </th>
      <th> </th>
      <th> </th>
      <th> </th>
      <th> </th>
      <th> </th>
      <th> </th>
      <th> </th>
    </tr>
  </table>
  <table align="center" STYLE="width: 700px">
    <tr align="center"><th>Otros Equipos</th></tr>
  </table>
  <table align="center" style="width: 700px">
    <tr>
      <th> Descripcion del equipo </th>
      <th> Marca y Modelo </th>
      <th> Codigo Patrimonial </th>
    </tr>
    @foreach($datos[4] as $mantenimiento)
    @foreach($datos[3] as $caracteristica)
    @if($mantenimiento->equipo==$caracteristica->id)
      @foreach($datos[0] as $equipo)
        @if($caracteristica->marca==$equipo->id)
          @if($equipo->tipo!="CPU" and $equipo->tipo!="LAPTOP")
            <tr STYLE="height: 20px">
              <th> {{$equipo->tipo}} </th>
              <th> {{$equipo->name}} </label></th>
              <th> {{$caracteristica->patrimonio}} </label></th>
            </tr>
          @endif  
        @endif
      @endforeach
    @endif
    @endforeach
    @endforeach
    <tr STYLE="height: 20px">
      <th>  </th>
      <th>  </th>
      <th>  </th>
    </tr>
  </table>
  <table align="center" style="width: 700px">
    <tr align="center"><th>Diagnostico del Equipo</th></tr>
  </table>
  <table align="center" style="width: 700px">
    <tr>
      <th> Fallo - Problema </th>
      <th> Causa </th>
      <th> Solucion </th>
    </tr>
    @foreach($datos[4] as $mantenimiento)
      @foreach($datos[3] as $caracteristica)
        @if($mantenimiento->equipo==$caracteristica->id)
          <tr STYLE="height: 40px">
            <th> {{$mantenimiento->problema}} </th>
            <th> {{$mantenimiento->causa}} </th>
            <th> {{$mantenimiento->solucion}} </th>
          </tr>
        @endif
      @endforeach
    @endforeach
    <tr STYLE="height: 85px">
      <th>  </th>
      <th>  </th>
      <th>  </th>
    </tr>
  </table>
  <table align="center" style="width: 700px">
    <tr align="center"><th>Observaciones</th></tr>
  </table>
  <table align="center" style="width: 700px">
    @foreach($datos[4] as $mantenimiento)
      @foreach($datos[3] as $caracteristica)
        @if($mantenimiento->equipo==$caracteristica->id)
        <tr>
          <th style="height: 60px"> {{$mantenimiento->observacion}} </th>
        </tr>
        @endif
      @endforeach
    @endforeach
  </table>