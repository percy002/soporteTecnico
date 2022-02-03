<form action="{{route('equipos.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreateMonitor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:teal">
                    <h4 class="modal-title">{{__('Creando nuevo monitor') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color:Azure">
                    <img Align="right" width="320" height="230" src="https://m.media-amazon.com/images/I/41Pg3izPy3L._SL500_.jpg">
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Equipo</label>
                        <input id="equipo" name="equipo" type="text" value="MONITOR" readonly />
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Codigo Patrimonial</label>
                        <input id="patrimonio" name="patrimonio" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Marca</label>
                        <input id="marca" name="marca" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Tipo</label>
                        <select id="tipo" name="tipo" class="form-control" required>
                            <option hidden selected>Selecciona una opción</option>
                            <option value="Led">Led</option>
                            <option value="LCD">LCD</option>
                        </select>
                    </div>
                    <img Align="right" width="320" height="230" src="https://m.media-amazon.com/images/I/71HPLtoRFpL._AC_SX450_.jpg">
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Tamaño</label>
                        <input id="tamaño" name="tamaño" type="number" min="17" max="32" class="form-control" required>
                    </div>
                    

                    @include('equipo.modal.includetrabajador')
                    
                    <div class="col-xs-12 col-sm-12 col-md-12>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>