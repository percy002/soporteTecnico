   
  
    <div class="modal fade text-left" id="{{'modalentrega'.$mantenimiento->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content"  style="background-color:teal">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Entregar Equipo') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row" style="background-color:Azure;margin:0">
                    <form action="{{ route('entregarEquipo', ['id' => $mantenimiento->id]) }}" method="POST">
                        @csrf
                    <div class="mb-3 col-6">
                        <label for="" class="form-label">Fecha de salida</label>
                        <input id="salida" name="salida" type="date" value="{{ $fecha_fin }}" class="form-control" tabindex="1" readonly>

                        <label for="" class="form-label">Encargado</label>
                        <input id="encargado" name="encargado" type="text" value="{{$mantenimiento->usuario->name}}" class="form-control" tabindex="2" readonly>

                         <label for="" class="form-label">Equipo que se dio mantenimiento</label>
                        <input id="equipo" name="equipo" type="text" class="form-control" value="{{ 'EQUIPO'.$mantenimiento->responsable_equipo->equipo->id .'|'. $mantenimiento->responsable_equipo->equipo->tipo .'-'. $mantenimiento->responsable_equipo->equipo->marca }}" tabindex="3" readonly>

                        
                    </div>
                    <div class="mb-3 col-6">
                        
                        <label for="" class="form-label">Problema</label>
                        <textarea id="problema" name="problema" rows="1" tabindex="4" class="form-control"  required>{{$mantenimiento->problema}}</textarea>
                        

                        <label for="" class="form-label">Causa</label>
                        <textarea id="causa" name="causa" rows="1" tabindex="5" class="form-control" >{{$mantenimiento->causa}}</textarea>

                        <label for="" class="form-label">Solucion</label>
                        <textarea id="solucion" name="solucion" rows="1" tabindex="6" class="form-control" >{{$mantenimiento->solucion}}</textarea>

                        <label for="" class="form-label">Observacion</label>
                        <textarea id="observacion" name="observacion" rows="1" tabindex="7" class="form-control">{{$mantenimiento->observacion}}</textarea>
                        
                    </div>
                    
                    <div class="col-12">

                        <h3 class="d-block">
                            Datos del responsable
                        </h3>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">DNI de la persona</label>
                        <input id="dni" name="dni" type="text" class="form-control" value="{{$mantenimiento->responsable_equipo->responsable->dni}}" tabindex="8" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Persona que recoje el equipo</label>
                        <input id="nombre" name="nombre" type="text" class="form-control" value="{{$mantenimiento->responsable_equipo->responsable->nombre}}" tabindex="9" required>
                    </div>
                    
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Estado</label>
                        
                            <input id="estado" name="estado" type="text" class="form-control" value="{{$mantenimiento->responsable_equipo->equipo->estado}}" tabindex="10" readonly>
                        
                    </div>
                    <a href="/mantenimientos" class="btn btn-secondary mr-3" tabindex="" >Cancelar</a>
                    <button type="submit" class="btn btn-primary" tabindex="11">Entregar</button>
                </form>
                </div>
            </div>
        </div>
 
