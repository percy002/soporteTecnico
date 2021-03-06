<?php $aux= array('ALCALDIA', 'ALMACEN DE SERVICIO MECANICO',
'AREA DE CONTROL DE MAQUINARIA', 'AREA DE ABASTECIMIENTO - FUNCIONAMIENTO',
'AREA DE ABASTECIMIENTO - INVERSION  - OBRAS', 'AREA DE ALMACEN',
'AREA DE ARCHIVO DE REGISTROS CIVILES', 'AREA DE ARCHIVO MUNICIPAL',
'AREA DE ARCHIVO PREDIAL', 'AREA DE ASISTENCIA SOCIAL',
'AREA DE AUDIOVISUALES', 'AREA DE CAJA', 'AREA DE CEMENTERIOS MUNICIPALES',
'AREA DE CENTROS RECREACIONALES', 'AREA DE CONTROL DE ENTRADA Y SALIDA DE BIENES Y SERVICIOS',
'AREA DE CONTROL DE LA DEUDA', 'AREA DE DESARROLLO Y ANALISIS DE SISTEMAS',
'AREA DE EDIF. CALIF. URBANAS', 'AREA DE ESCALAFON Y CONTROL DE PERSONAL',
'AREA DE EVALUACION DE EXPEDIENTES TECNICOS', 'AREA DE FISCALIZACION',
'AREA DE FISCALIZACION DE CONTROL URBANO', 'AREA DE FISCALIZACION TRIBUTARIA',
'AREA DE INSPECCIONES TECNICAS DE SEGURIDAD EN EDIFICACIONES', 'AREA DE INSPECTORIA DE OBRAS',
'AREA DE MANTENIMIENTO DE VIAS E INFRAESTRUCTURA', 'AREA DE MANTENIMIENTO Y TALLER',
'AREA DE MERCADOS', 'AREA DE PARQUES Y JARDINES', 'AREA DE PLANILLAS Y REMUNERACIONES',
'AREA DE PRENSA Y COMUNICACIONES', 'AREA DE PROMOCION DE CULTURA Y DEPORTE',
'AREA DE PROMOCION DEL TURISMO', 'AREA DE REGISTRO CIVIL',
'AREA DE REGISTRO DE BIENES MUEBLES POR FUNCIONAMIENTO E INVERSION',
'AREA DE REGISTRO DE INVENTARIO DE BIENES MUEBLES E INMUEBLES',
'AREA DE SANEAMIENTO FISICO LEGAL', 'AREA DE SEGURIDAD CIUDADANA',
'AREA DE SEPARACION CONVENCIONAL Y DIVORCIO ULTERIOR', 'AREA DE SERENAZGO',
'AREA DE SOPORTE INFORMATICO TRIBUTARIO', 'AREA DE SOPORTE TECNICO Y REDES',
'AREA DE TRAMITE DOCUMENTARIO', 'AREA FINANCIERA DE MANTENIMIENTO DE OBRAS',
'AREA LEGAL DE CONTROL URBANO', 'AREA TECNICA DE MANTENIMIENTO DE OBRAS',
'AREA TECNICA DE PLANEAMIENTO', 'BIBLIOTECA MUNICIPAL', 'CASA ACOGIDA',
'CENTRO DEL ADULTO MAYOR', 'CONCEJO MUNICIPAL', 'DEMUNA',
'ESCUELA TALLER DE CCARAO', 'GERENCIA DE ADMINISTRACION',
'GERENCIA DE ADMINISTRACION TRIBUTARIA', 'GERENCIA DE ASUNTOS LEGALES',
'GERENCIA DE CATASTRO', 'GERENCIA DE DESARROLLO ECONOMICO',
'GERENCIA DE DESARROLLO SOCIAL Y HUMANO', 'GERENCIA DE DESARROLLO URBANO Y RURAL',
'GERENCIA DE INFRAESTRUCTURA MUNICIPAL', 'GERENCIA DE INFRAESTRUCTURA',
'GERENCIA DE PLANEAMIENTO Y PRESUPUESTO', 'GERENCIA DE PROYECTOS',
'GERENCIA DE RECURSOS HUMANOS', 'GERENCIA DE SEGURIDAD CIUDADANA, FISCALIZACION Y NOTIFICACIONES',
'GERENCIA DE SERVICIOS Y MEDIO AMBIENTE', 'GERENCIA MUNICIPAL',
'JEFE DE  UNIDAD LOCAL DE EMPADRONAMIENTO (ULE)', 'LUDOTECA', 'MAQUICENTRO',
'OFICINA CENTRAL DE NOTIFICACIONES', 'OFICINA DE CONTROL INSTITUCIONAL',
'OFICINA DE DEFENSA CIVIL', 'OFICINA DE EJECUCION COACTIVA',
'OFICINA DE PROCURADURIA PUBLICA MUNICIPAL', 'OFICINA DE RELACIONES PUBLICAS',
'OFICINA DE SECRETARIA GENERAL', 'OFICINA DE SUPERVISION DE OBRAS',
'OFICINA DE TECNOLOGIA Y SISTEMAS INFORMATICOS', 'OMAPED', 'POLICIA MUNICIPAL',
'PREPARACION, RESPUESTA Y ESTIMACION DE RIESGOS', 'PROGRAMA DE VASO DE LECHE',
'PUESTO DE SALUD INTINERANTE', 'SSOMA', 'SUB GERENCIA AMBIENTAL DE SANEAMIENTO BASICO (OMSABA)',
'SUB GERENCIA DE ABASTECIMIENTOS', 'SUB GERENCIA DE ADMINISTRACION URBANO RURAL',
'SUB GERENCIA DE ASESORIA LEGAL TRIBUTARIA', 'SUB GERENCIA DE CATASTRO URBANO',
'SUB GERENCIA DE CONTABILIDAD', 'SUB GERENCIA DE CONTROL PATRIMONIAL',
'SUB GERENCIA DE CONTROL URBANO Y FISCALIZACION',
'SUB GERENCIA DE CULTURA, EDUCACION, DEPORTE Y SERVICIOS FUNERARIOS',
'SUB GERENCIA DE DESARROLLO TERRITORIAL Y TRANSITO', 'SUB GERENCIA DE EJECUCION DE OBRAS',
'SUB GERENCIA DE EXPEDIENTES TECNICOS', 'SUB GERENCIA DE FISCALIZACION AMBIENTAL (UOFA)',
'SUB GERENCIA DE FISCALIZACION TRIBUTARIA'
);
?>

<form action="{{route('equipos.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreateTrabajador" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content"  style="background-color:teal">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Creando responsable') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color:Azure">
                    <img Align="right" width="300" height="250" src="https://previews.123rf.com/images/sudowoodo/sudowoodo1507/sudowoodo150700014/42186961-los-empresarios-j%C3%B3venes-hombre-y-mujer-en-el-estilo-de-dibujos-animados-en-el-juego-con-la-maleta-ai.jpg">
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Campo</label>
                        <input id="equipo" name="equipo" type="text" value="TRABAJADOR" readonly />
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Lugar de trabajo</label>
                        <select id="lugar" name="lugar" class="form-control selectpicker" data-live-search="true" required>
                            <option hidden selected>Selecciona una opci??n</option>
                            @for ($k = 0; $k < count($aux); $k++)
                                <option value="{{$aux[$k]}}">{{$aux[$k]}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Trabajador</label>
                        <input id="trabajador" name="trabajador" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">DNI</label>
                        <input id="DNI" name="DNI" type="text" class="form-control" required>
                    </div>
                    <img Align="right" width="300" height="200" src="https://previews.123rf.com/images/vectorkif/vectorkif1806/vectorkif180600200/103430109-builder-man-and-woman-in-uniform-cartoon-characters-professional-construction-workers-smiling-repair.jpg">
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Observacion</label>
                        <input id="observacion" name="observacion" type="text" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>