@extends('adminlte::page')

@section('content')
<h2><strong>Creando personal de</strong></h2>
<h2><strong>Soporte Técnico</strong></h2>
<br>
<form action="/personas" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 col-4">
        <label for="" class="form-label">Nombre(s) y Apellidos</label>
        <input id="name" name="name" type="text" class="form-control" tabindex="1" required>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">DNI</label>
        <input id="dni" name="dni" type="text" class="form-control" tabindex="2" required>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Celular</label>
        <input id="celular" name="celular" type="text" class="form-control" tabindex="3" required>
    </div>
    <div class="mb-3 col-4">
        <label for="" class="form-label">Rol</label>
        <select id="rol" name="rol" class="form-control" tabindex="4" required>
            <option value="trabajador" selected>Trabajador</option>
            <option value="administrador">Administrador</option>
        </select>
    </div>
    <br>
    <a href="/personas" class="btn btn-secondary" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/valorespredeterminados-*.min.js"> </script>
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
        else if(str == "CPU"){
            $("#tamaño").css('display', 'none');
            $("#bateria").css('display', 'none');
            $("#socket").css('display', 'block');
        }
        else if(str == "LAPTOP"){
            $("#tamaño").css('display', 'block');
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