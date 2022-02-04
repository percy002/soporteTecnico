@extends('adminlte::page')

@section('title', 'Equipos')

@section('content')
<img Align="right" width="450" height="280" src="http://mdsperu.com/web/image/product.template/12567/image_1024?unique=63fb614">

<h1><strong>CREAR EQUIPO NUEVO</strong></h1>

<form action="/equipos" method="POST" enctype="multipart/form-data">
    @csrf
    <br>
    <div class="mb-3 col-7">
        <h1><label for="" class="form-label">¿Que equipo desea agregar?</label></h1>
        <br>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateCPU" style="color:white">
            <span style="color:white">CPU / LAPTOP</span>
        </a>
        <?php echo "\t"; ?>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateImpresora" style="color:white">
            <span style="color:white">IMPRESORA / ESCANER</span>
        </a>
        <?php echo "\t"; ?>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateMonitor" style="color:white">
            <span style="color:white">MONITOR</span>
        </a>
        <br><br>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateMouse" style="color:white">
            <span style="color:white">MOUSE</span>
        </a>
        <?php echo "\t"; ?>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateParlante" style="color:white">
            <span style="color:white">PARLANTE</span>
        </a>
        <?php echo "\t"; ?>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateTeclado" style="color:white">
            <span style="color:white">TECLADO</span>
        </a><?php echo "\t"; ?>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateEstabilizador" style="color:white">
            <span style="color:white">ESTABILIZADOR / UPC</span>
        </a>
    </div>
    <br>
    {{-- <img Align="right" width="450" height="280" src="https://factorcapitalhumano.com/wp-content/uploads/2020/04/trabajadores-condiciones-durante-la-contingencia-sanitaria.jpg">
    <div class="mb-3 col-7">
        <h1><label for="" class="form-label">Responsable de equipo</label></h1>
        <br>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateTrabajador" style="color:white">
            <span style="color:white">Responsable</span>
        </a>
    </div> --}}
    <br>
    <a href="/mantenimientos" class="btn btn-secondary">Cancelar</a>
    <a href="/mantenimientos\create" class="btn btn-primary">Crear mantenimiento</a>

    @include('equipo.modal.CPU')
    @include('equipo.modal.estabilizador')
    @include('equipo.modal.impresora')
    @include('equipo.modal.monitor')
    @include('equipo.modal.mouse')
    @include('equipo.modal.parlante')
    @include('equipo.modal.teclado')
    @include('equipo.modal.trabajador')

</form>
@stop
@section('js')
<script type="text/javascript">
    @error ('patrimonio')
        $('#ModalCreateTeclado').modal('show');
    @enderror
    </script>
@endsection