@extends('adminlte::page')

@section('content')
<h1>MODIFICAR EQUIPO</h1>

<form class="row g-3" action="/equipos/{{$equipo->id}}" method="POST">
    @csrf
    @method('PUT')
    
    <br>

    <div class="mb-3 col-4">
        <label for="" class="form-label">Equipo</label>
        <input id="equipo" name="equipo" type="text" value="{{$equipo->tipo}}" class="form-control" tabindex="1" readonly />
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Codigo Patrimonial</label>
        <input id="patrimonio" name="patrimonio" type="text" value="{{$equipo->patrimonio}}" class="form-control" tabindex="2" readonly />
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Marca</label>
        <input id="marca" name="marca" type="text" value="{{$equipo->name}}" class="form-control" tabindex="3" readonly />
    </div>

    @if($equipo->tipo=="CPU")
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Sistema Operativo</label>
                        <select id="sistema" name="sistema" class="form-control" required>
                            <option hidden selected>{{$equipo->sistema}}</option>
                            <option value="Windows 7 - 32 bits">Windows 7 - 32 bits</option>
                            <option value="Windows 7 -64 bits">Windows 7 - 64 bits</option>
                            <option value="Windows 8 - 32 bits">Windows 8 - 32 bits</option>
                            <option value="Windows 8 - 64 bits">Windows 8 - 64 bits</option>
                            <option value="Windows 8.1 - 32 bits">Windows 8.1 - 32 bits</option>
                            <option value="Windows 8.1 - 64 bits">Windows 8.1 - 64 bits</option>
                            <option value="Windows 10 - 32 bits">Windows 10 - 32 bits</option>
                            <option value="Windows 10 - 64 bits">Windows 10 - 64 bits</option>
                        </select>
                    </div>
                    <?php $separador1 = explode("-", $equipo->procesador); ?>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Procesador</label>
                        <input id="velocidad" name="velocidad" type="number" value="{{$separador1[2]}}" min="1" max="10" required>
                        <select id="aux1" name="aux1" class="form-control" onchange="showresult(this.value)" required>
                            <option hidden selected>{{$separador1[0]}}</option>
                            <option value="Intel">Intel</option>
                            <option value="AMD">AMD</option>
                        </select>
                        @if($separador1[0]=="Intel")
                        <select id="procesador1" name="procesador1" class="form-control">
                            <option hidden selected>{{$separador1[1]}}</option>
                            <option value="Centrino">Centrino</option>
                            <option value="Core 2 Duo">Core 2 Duo</option>
                            <option value="Core 2 Quad">Core 2 Quad</option>
                            <option value="Pentium IV">Pentium IV</option>
                            <option value="Pentium D">Pentium D</option>
                            <option value="Core I3">Core I3</option>
                            <option value="Core I5">Core I5</option>
                            <option value="Core I7">Core I7</option>
                        </select>
                        <select id="procesador2" name="procesador2" class="form-control" style="display:none">
                            <option hidden selected>Selecciona una opción</option>
                            <option value="AMD E">AMD E</option>
                            <option value="Athon II">Athon II</option>
                            <option value="Athon VI">Athon VI</option>
                            <option value="Ryzen 2000">Ryzen 2000</option>
                            <option value="Ryzen 3000">Ryzen 3000</option>
                            <option value="Ryzen 5000">Ryzen 5000</option>
                        </select>
                        @else
                        <select id="procesador1" name="procesador1" class="form-control" style="display:none">
                            <option hidden selected>Selecciona una opción</option>
                            <option value="Centrino">Centrino</option>
                            <option value="Core 2 Duo">Core 2 Duo</option>
                            <option value="Core 2 Quad">Core 2 Quad</option>
                            <option value="Pentium IV">Pentium IV</option>
                            <option value="Pentium D">Pentium D</option>
                            <option value="Core I3">Core I3</option>
                            <option value="Core I5">Core I5</option>
                            <option value="Core I7">Core I7</option>
                        </select>
                        <select id="procesador2" name="procesador2" class="form-control">
                            <option hidden selected>{{$separador1[1]}}</option>
                            <option value="AMD E">AMD E</option>
                            <option value="Athon II">Athon II</option>
                            <option value="Athon VI">Athon VI</option>
                            <option value="Ryzen 2000">Ryzen 2000</option>
                            <option value="Ryzen 3000">Ryzen 3000</option>
                            <option value="Ryzen 5000">Ryzen 5000</option>
                        </select>
                        @endif
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Placa</label>
                        <input id="placa" name="placa" type="text" class="form-control" value="{{$equipo->placa}}" tabindex="6" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Socket</label>
                        <input id="socket" name="socket" type="text" class="form-control" value="{{$equipo->socket}}" tabindex="7" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">RAM</label>
                        <input id="RAM" name="RAM" type="number" value="{{$equipo->RAM}}" min="4" max="32" class="form-control" tabindex="8" required>
                    </div>
                    <?php $separador2 = explode(" ", $equipo->disco); ?>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Tipo de Disco</label>
                        <select id="disco1" name="disco1" class="form-control" required>
                            <option hidden selected>{{$separador2[2]}}</option>
                            <option value="Solido">Solido</option>
                            <option value="Mecanico">Mecanico</option>
                        </select><br>
                        <label for="" class="form-label">Tamaño de Disco</label>
                        <select id="aux2" name="aux2" onchange="showresult(this.value)" required>
                            <option hidden selected>{{$separador2[1]}}</option>
                            <option value="GB">GB</option>
                            <option value="Teras">Teras</option>
                        </select>
                        @if($separador2[1]=="GB")
                        <input id="disco11" name="disco11" type="number" min="1" max="30" class="form-control" style="display:none">
                        <input id="disco12" name="disco12" type="number" value="{{$separador2[0]}}" step="10" min="100" max="990" class="form-control">
                        @else
                        
                        <input id="disco11" name="disco11" type="number" value="{{$separador2[0]}}" min="1" max="30" class="form-control">
                        <input id="disco12" name="disco12" type="number" step="10" min="100" max="990" class="form-control" style="display:none">
                        @endif
                    </div>
                    @if($equipo->video==0)
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Video</label><br>
                        <select id="aux3" name="aux3" class="form-control" onchange="showresult(this.value)" required>
                            <option value=4>Si tiene</option>
                            <option value=5 selected>No tiene</option>
                        </select>
                        <input id="video" name="video" type="number" min="1" max="16" style="display:none" class="form-control">
                    </div>
                    @else
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Video</label><br>
                        <select id="aux3" name="aux3" class="form-control" onchange="showresult(this.value)" required>
                            <option value=4 selected>Si tiene</option>
                            <option value=5>No tiene</option>
                        </select>
                        <input id="video" name="video" type="number" min="1" max="16" value="{{$equipo->video}}" class="form-control">
                    </div>
                    @endif
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Red (Direccion IP)</label>
                        <input id="red" name="red" type="text" value="{{$equipo->red}}" class="form-control" tabindex="11" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Lectora</label>
                        <select id="lectora" name="lectora" class="form-control" tabindex="12" required>
                            @if($equipo->lectora==1)
                                <option value=1 selected>SI</option>
                                <option value=0>NO</option>
                            @else
                                <option value=1>SI</option>
                                <option value=0 selected>NO</option>
                            @endif
                        </select>
                    </div>

    @elseif($equipo->tipo=="IMPRESORA" or $equipo->tipo=="ESCANER")
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Tipo</label>
                        <select id="tipo" name="tipo" class="form-control" required>
                            <option hidden selected>{{$equipo->tipo}}</option>
                            <option value="Laser" selected>Laser</option>
                            <option value="Matrisial">Matrisial</option>
                            <option value="Tinta">Tinta</option>
                        </select>
                    </div>

    @elseif($equipo->tipo=="LAPTOP")
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Sistema Operativo</label>
                        <select id="sistema" name="sistema" class="form-control" required>
                            <option hidden selected>{{$equipo->sistema}}</option>
                            <option value="Windows 7 - 32 bits">Windows 7 - 32 bits</option>
                            <option value="Windows 7 -64 bits">Windows 7 - 64 bits</option>
                            <option value="Windows 8 - 32 bits">Windows 8 - 32 bits</option>
                            <option value="Windows 8 - 64 bits">Windows 8 - 64 bits</option>
                            <option value="Windows 8.1 - 32 bits">Windows 8.1 - 32 bits</option>
                            <option value="Windows 8.1 - 64 bits">Windows 8.1 - 64 bits</option>
                            <option value="Windows 10 - 32 bits">Windows 10 - 32 bits</option>
                            <option value="Windows 10 - 64 bits">Windows 10 - 64 bits</option>
                        </select>
                    </div>
                    <?php $separador1 = explode("-", $equipo->procesador); ?>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Procesador</label>
                        <input id="velocidad" name="velocidad" type="number" value="{{$separador1[2]}}" min="1" max="10" required>
                        <select id="aux1" name="aux1" class="form-control" onchange="showresult(this.value)" required>
                            <option hidden selected>{{$separador1[0]}}</option>
                            <option value="Intel">Intel</option>
                            <option value="AMD">AMD</option>
                        </select>
                        @if($separador1[0]=="Intel")
                        <select id="procesador1" name="procesador1" class="form-control">
                            <option hidden selected>{{$separador1[1]}}</option>
                            <option value="Centrino">Centrino</option>
                            <option value="Core 2 Duo">Core 2 Duo</option>
                            <option value="Core 2 Quad">Core 2 Quad</option>
                            <option value="Pentium IV">Pentium IV</option>
                            <option value="Pentium D">Pentium D</option>
                            <option value="Core I3">Core I3</option>
                            <option value="Core I5">Core I5</option>
                            <option value="Core I7">Core I7</option>
                        </select>
                        <select id="procesador2" name="procesador2" class="form-control" style="display:none">
                            <option hidden selected>Selecciona una opción</option>
                            <option value="AMD E">AMD E</option>
                            <option value="Athon II">Athon II</option>
                            <option value="Athon VI">Athon VI</option>
                            <option value="Ryzen 2000">Ryzen 2000</option>
                            <option value="Ryzen 3000">Ryzen 3000</option>
                            <option value="Ryzen 5000">Ryzen 5000</option>
                        </select>
                        @else
                        <select id="procesador1" name="procesador1" class="form-control" style="display:none">
                            <option hidden selected>Selecciona una opción</option>
                            <option value="Centrino">Centrino</option>
                            <option value="Core 2 Duo">Core 2 Duo</option>
                            <option value="Core 2 Quad">Core 2 Quad</option>
                            <option value="Pentium IV">Pentium IV</option>
                            <option value="Pentium D">Pentium D</option>
                            <option value="Core I3">Core I3</option>
                            <option value="Core I5">Core I5</option>
                            <option value="Core I7">Core I7</option>
                        </select>
                        <select id="procesador2" name="procesador2" class="form-control">
                            <option hidden selected>{{$separador1[1]}}</option>
                            <option value="AMD E">AMD E</option>
                            <option value="Athon II">Athon II</option>
                            <option value="Athon VI">Athon VI</option>
                            <option value="Ryzen 2000">Ryzen 2000</option>
                            <option value="Ryzen 3000">Ryzen 3000</option>
                            <option value="Ryzen 5000">Ryzen 5000</option>
                        </select>
                        @endif
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Placa</label>
                        <input id="placa" name="placa" type="text" class="form-control" value="{{$equipo->placa}}" tabindex="6" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">RAM</label>
                        <input id="RAM" name="RAM" type="number" value="{{$equipo->RAM}}" min="4" max="32" class="form-control" tabindex="8" required>
                    </div>
                    <?php $separador2 = explode(" ", $equipo->disco); ?>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Tipo de Disco</label>
                        <select id="disco1" name="disco1" class="form-control" required>
                            <option hidden selected>{{$separador2[2]}}</option>
                            <option value="Solido">Solido</option>
                            <option value="Mecanico">Mecanico</option>
                        </select><br>
                        <label for="" class="form-label">Tamaño de Disco</label>
                        <select id="aux2" name="aux2" onchange="showresult(this.value)" required>
                            <option hidden selected>{{$separador2[1]}}</option>
                            <option value="GB">GB</option>
                            <option value="Teras">Teras</option>
                        </select>
                        @if($separador2[1]=="GB")
                        <input id="disco11" name="disco11" type="number" min="1" max="30" class="form-control" style="display:none">
                        <input id="disco12" name="disco12" type="number" value="{{$separador2[0]}}" step="10" min="100" max="990" class="form-control">
                        @else
                        
                        <input id="disco11" name="disco11" type="number" value="{{$separador2[0]}}" min="1" max="30" class="form-control">
                        <input id="disco12" name="disco12" type="number" step="10" min="100" max="990" class="form-control" style="display:none">
                        @endif
                    </div>
                    @if($equipo->video==0)
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Video</label><br>
                        <select id="aux3" name="aux3" class="form-control" onchange="showresult(this.value)" required>
                            <option value=4>Si tiene</option>
                            <option value=5 selected>No tiene</option>
                        </select>
                        <input id="video" name="video" type="number" min="1" max="16" style="display:none" class="form-control">
                    </div>
                    @else
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Video</label><br>
                        <select id="aux3" name="aux3" class="form-control" onchange="showresult(this.value)" required>
                            <option value=4 selected>Si tiene</option>
                            <option value=5>No tiene</option>
                        </select>
                        <input id="video" name="video" type="number" min="1" max="16" value="{{$equipo->video}}" class="form-control">
                    </div>
                    @endif
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Tamaño</label>
                        <input id="tamaño" name="tamaño" type="number" value="{{$equipo->tamaño}}" step="0.1" min="10.0" max="20.0" class="form-control" tabindex="10" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">¿Funciona solo con bateria?</label>
                        <select id="bateria" name="bateria" class="form-control" tabindex="11" required>
                            @if($equipo->bateria==1)
                                <option value=1 selected>SI</option>
                                <option value=0>NO</option>
                            @else
                                <option value=1>SI</option>
                                <option value=0 selected>NO</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Red (Direccion IP)</label>
                        <input id="red" name="red" type="text" value="{{$equipo->red}}" class="form-control" tabindex="11" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Lectora</label>
                        <select id="lectora" name="lectora" class="form-control" tabindex="12" required>
                            @if($equipo->lectora==1)
                                <option value=1 selected>SI</option>
                                <option value=0>NO</option>
                            @else
                                <option value=1>SI</option>
                                <option value=0 selected>NO</option>
                            @endif
                        </select>
                    </div>

    @elseif($equipo->tipo=="MONITOR")
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Tipo</label>
                        <select id="tipo" name="tipo" class="form-control" required>
                            <option hidden selected>{{$equipo->tipo}}</option>
                            <option value="Led">Led</option>
                            <option value="LCP">LCP</option>
                        </select>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Tamaño</label>
                        <input id="tamaño" name="tamaño" type="number" value="{{$equipo->tamaño}}" min="17" max="32" class="form-control" required>
                    </div>

    @elseif($equipo->tipo=="MOUSE" or $equipo->tipo=="TECLADO")
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Tipo</label>
                        <select id="tipo" name="tipo" class="form-control" required>
                            <option hidden selected>{{$equipo->tipo}}</option>
                            <option value="PS2">PS2</option>
                            <option value="USB">USB</option>
                        </select>
                    </div>

    @endif

    <br><br>
    <?php $separador3 = explode("|", $equipo->estado);  ?>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Estado</label>
        <select id="estado" name="estado" class="form-control" required>
            <option hidden selected>{{$separador3[0]}}</option>
            <option value=1>OPERATIVO</option>
            <option value=0>INOPERATIVO</option>
        </select>
        @if (count($separador3)>1)
        <input id="estado2" name="estado2" type="text" value="{{$separador3[1]}}" class="form-control">
        @endif
    </div>
    <br><br>
    <div class="mb-3 col-10">
    <a href="/equipos" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@stop

@section('js')
    <script>
        function showresult(str) {
            if (str == "Intel") {
                $("#procesador1").css('display', 'block');
                $("#procesador2").css('display', 'none');
            }
            else if(str == "AMD"){
                $("#procesador1").css('display', 'none');
                $("#procesador2").css('display', 'block');
            }
            else if (str == "GB") {
                $("#disco11").css('display', 'none');
                $("#disco12").css('display', 'block');
            }
            else if(str == "Teras"){
                $("#disco11").css('display', 'block');
                $("#disco12").css('display', 'none');
            }
            else if (str == 4) {
                $("#video").css('display', 'block');
            }
            else if(str == 5){
                $("#video").css('display', 'none');
            }
            return;
        }
        $(document).ready(function(){
            showresult(this.value);
        });
    </script>
@stop