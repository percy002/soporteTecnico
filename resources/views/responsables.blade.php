@extends('adminlte::page')

@section('title', 'Responsables')

@section('content_header')
    <h1><strong>Encargados de Soporte Técnico</strong></h1>
@stop

@section('content')

<div class="container">
        <div class="row">
            <div class="col-12 my-3 pt-3 shadow">
                <h1><i class="btn btn-danger fas fa-user"></i>&nbsp;Juan Jorge Alarcon Alosilla</h1>
                <label ><i class=" btn btn-danger fas fa-address-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;juanito@gmail.com</label><br>
                <p>    
                <label><i class=" btn btn-danger fas fa-user-tie"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Soporte Tecnico</label><br>
                <label ><i  class=" btn btn-danger btn btn-info fas fa-phone-square-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;984 776 375</label><br>
                <label ><i  class=" btn btn-danger btn btn-info fas fa-phone-square-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atencion de lunes-vie</label>
                </p>
            </div>
            <div class="col-12 my-3 pt-3 shadow">
            <h1><i class=" btn btn-info fas fa-user"></i>&nbsp;Alexander Hancco Gamboa</h1>
            <label><i class=" btn btn-info fas fa-address-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;alex@gmail.com</label><br>
                <p>  
                <label><i class="btn btn-info fas fa-user-tie"></i> &nbsp;&nbsp;&nbsp;&nbsp;Soporte Tecnico</label><br>
                <label><i class=" btn btn-info fas fa-phone-square-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;973 253 010</label><br>
                <label><i class=" btn btn-info fas fa-phone-square-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atencion de lun-vie</label>
                </p>
            </div>
            <div class="col-12 my-3 pt-3 shadow">
            <h1><i class=" btn btn-success fas fa-user"></i>&nbsp;Alfredo Ninancuro Pampilla</h1>
            <label><i class=" btn btn-success fas fa-address-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;alfredo@gmail.com</label><br>
                <p>  
                <label><i class="btn btn-success fas fa-user-tie"></i> &nbsp;&nbsp;&nbsp;&nbsp;Soporte Tecnico</label><br>
                <label><i class=" btn btn-success fas fa-phone-square-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;967 763 179</label><br>
                <label><i class=" btn btn-success fas fa-phone-square-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atencion de lun-vie</label>
                </p>
            </div> 
        </div>
 </div>
 
 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://kit.fontawesome.com/0ff8f68011.js" crossorigin="anonymous"></script>
<scrip src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></scrip>
<scrip src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></scrip>
@stop