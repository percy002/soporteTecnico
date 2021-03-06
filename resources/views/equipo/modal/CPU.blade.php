<form action="{{route('equipos.store')}}" method="post" enctype="multipart/form-data" autocomplete="nope">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreateCPU" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content"  style="background-color:teal">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Creando nuevo Equipo') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color:Azure">
                    <img Align="right" width="330" height="330" src="http://1.bp.blogspot.com/-74uplHoOBao/TgkJqBp6YbI/AAAAAAAAACM/7CsdJAS8luE/s320/CPU.png">
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">Equipo</label>
                        <select id="equipo" name="equipo" class="form-control" onchange="showresult(this.value)" required>
                            <option value="CPU" selected>CPU</option>
                            <option value="LAPTOP">LAPTOP</option>
                        </select>
                    </div>
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">Codigo Patrimonial</label>
                        <input id="patrimonio" name="patrimonio" type="text" class="form-control" autocomplete="off" typeage required>
                    </div>
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">Marca</label>
                        <input id="marca" name="marca" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">Sistema Operativo</label>
                        <select id="sistema" name="sistema" class="form-control" required>
                            {{-- <option hidden selected>Selecciona una opci??n</option> --}}
                            <option value="Windows 7 - 32 bits">Windows 7 - 32 bits</option>
                            <option value="Windows 7 -64 bits">Windows 7 - 64 bits</option>
                            <option value="Windows 8 - 32 bits">Windows 8 - 32 bits</option>
                            <option value="Windows 8 - 64 bits">Windows 8 - 64 bits</option>
                            <option value="Windows 8.1 - 32 bits">Windows 8.1 - 32 bits</option>
                            <option value="Windows 8.1 - 64 bits">Windows 8.1 - 64 bits</option>
                            <option value="Windows 10 - 32 bits">Windows 10 - 32 bits</option>
                            <option value="Windows 10 - 64 bits" selected>Windows 10 - 64 bits</option>
                        </select>
                    </div>
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">Procesador</label>
                        {{-- <input id="velocidad" name="velocidad" type="number" min="1" max="10" value="" required> --}}
                        <select id="procesador_marca" name="procesador_marca" class="form-control" onchange="showresult(this.value)" required>
                            {{-- <option hidden selected>Selecciona una opci??n</option> --}}
                            <option value="Intel" selected>Intel</option>
                            <option value="AMD">AMD</option>
                        </select>
                        <select id="procesador1" name="procesador1" class="form-control" style="display:none">
                            {{-- <option hidden selected>Selecciona una opci??n</option> --}}
                            <option value="Centrino">Centrino</option>
                            <option value="Core 2 Duo">Core 2 Duo</option>
                            <option value="Core 2 Quad">Core 2 Quad</option>
                            <option value="Pentium IV">Pentium IV</option>
                            <option value="Pentium D">Pentium D</option>
                            <option value="Core I3" selected>Core I3</option>
                            <option value="Core I5">Core I5</option>
                            <option value="Core I7">Core I7</option>
                        </select>
                        <select id="procesador2" name="procesador2" class="form-control" style="display:none">
                            {{-- <option hidden selected>Selecciona una opci??n</option> --}}
                            <option value="AMD E">AMD E</option>
                            <option value="Athon II">Athon II</option>
                            <option value="Athon VI">Athon VI</option>
                            <option value="Ryzen 2000">Ryzen 2000</option>
                            <option value="Ryzen 3000" selected>Ryzen 3000</option>
                            <option value="Ryzen 5000">Ryzen 5000</option>
                        </select>
                    </div>
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">Placa</label>
                        <input id="placa" name="placa" type="text" class="form-control" required>
                    </div>
                    <img Align="right" width="330" height="330" src="https://www.lenovo.com/medias/lenovo-laptop-ideapad-3-15-intel-hero.png?context=bWFzdGVyfHJvb3R8MzAzNDQ1fGltYWdlL3BuZ3xoNjYvaDY2LzEwNzU3MjQxNTAzNzc0LnBuZ3xjMzU3NWY4OGEyYjYzYTEwOGFlYzhiNWJhODEwYzA1MTlkNDYxODI3ZGQxM2IzYTRhYmY4M2YzY2NjYjhhOGJj">
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">Socket</label>
                        <input id="socket" name="socket" type="text" class="form-control">
                    </div>
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">RAM</label>
                        <input id="ram" name="ram" type="number" min="4" max="32" class="form-control" required>
                    </div>
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">Tipo de Disco</label>
                        <select id="disco1" name="disco1" class="form-control" required>
                            {{-- <option hidden selected>Selecciona una opci??n</option> --}}
                            <option value="Solido">Solido</option>
                            <option value="Mecanico" selected>Mecanico</option>
                        </select><br>
                        <label for="" class="form-label">Tama??o de Disco</label>
                        <select id="aux2" name="aux2" onchange="showresult(this.value)" required>
                            {{-- <option hidden selected>Selecciona una opci??n</option> --}}
                            <option value="GB" selected>GB</option>
                            <option value="Teras">Teras</option>
                        </select>
                        <input id="disco11" name="disco11" type="number" min="1" max="30" class="form-control" style="display:none">
                        <input id="disco12" name="disco12" type="number" step="10" min="100" max="990" class="form-control" style="display:block">
                    </div>
                    <div class="form-group mb-3 col-5">
                        <label for="" class="form-label">Video</label><br>
                        <select id="aux3" name="aux3" class="form-control" onchange="showresult(this.value)" required>
                            {{-- <option hidden selected>Selecciona una opci??n</option> --}}
                            <option value=4>Si tiene</option>
                            <option value=5 selected>No tiene</option>
                        </select>
                        <input id="video" name="video" type="number" min="1" max="16" style="display:none" class="form-control">
                    </div>
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">Tama??o</label>
                        <input id="tama??o" name="tama??o" type="number" step="0.1" min="10.0" max="20.0" class="form-control" style="display:none">
                    </div>
                    <div class="mb-3 col-5">
                        <label for="bateria" class="form-label">Estado de la bateria</label>
                        <select id="bateria" name="bateria" class="form-control" style="display:none">
                            <option value="OPERATIVO" selected>OPERATIVO</option>
                            <option value="INOPERATIVO" >INOPERATIVO</option>
                        </select>
                    </div>
                    <img Align="right" width="330" height="330" src="https://m.media-amazon.com/images/I/41QHfUYOICL.jpg">
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">Red (Direccion IP)</label>w
                        <input id="red" name="red" type="text" class="form-control">
                    </div>
                    <div class="mb-3 col-5">
                        <label for="" class="form-label">Lectora</label>
                        <select id="lectora" name="lectora" class="form-control" required>
                            {{-- <option hidden selected>Selecciona una opci??n</option> --}}
                            <option value=SI>SI</option>
                            <option value=NO selected>NO</option>
                        </select>
                    </div>
                   

                    @include('equipo.modal.includetrabajador')
                   


                    <div class="col-xs-12 col-sm-12 col-md-12>">
                        {{-- <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancelar</a> --}}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@section('css')
{{-- <link rel="stylesheet" href={{mix('style.css')}}> --}}
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script>
        // path="{{url('equipos/buscar')}}";
        // $('#patrimonio').typeahead({
        //     $ajax({
        //         url:'{{route('equipos.buscar')}}',
        //         type:'post',
        //         dataType:'json',
        //         data{
        //             _token:CSRF_TOKEN,
        //             search:request.term
        //         },
        //         success:function(data) {
        //             response(data);
        //         }
        //     })
        // })

        // $('#patrimonio').autocomplete({
        //     source: function(request,response){
        //         $.ajax({
        //             url:'{{route('equipos.buscar')}}',
        //             datatype:'json',
        //             data:{
        //                 term: request.term
        //             }
        //             success: function(data){
        //                 response(data)
        //             }
        //         })
        //     }
        // })
    </script>
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
                // $("#tama??o").css('display', 'block');
            }
            else if(str == 5){
                $("#video").css('display', 'none');
                // $("#tama??o").css('display', 'none');
            }
            else if(str == "CPU"){
                $("#tama??o").css('display', 'none');
                $("#bateria").css('display', 'none');
                $("#socket").css('display', 'block');
            }
            else if(str == "LAPTOP"){
                $("#tama??o").css('display', 'block');
                $("#bateria").css('display', 'block');
                $("#socket").css('display', 'none');
            }
            return;
        }
        $(document).ready(function(){
            showresult(this.value);
        });
    </script>
@stop