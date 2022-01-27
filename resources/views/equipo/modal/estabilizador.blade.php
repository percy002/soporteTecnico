<form action="{{route('equipos.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreateEstabilizador" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content"  style="background-color:teal">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Creando nuevo estabilizador') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color:Azure">
                    <img Align="right" width="380" height="330" src="https://cdn.lumingo.com/medias/0100539799-000000000004748101-0-c515Wx515H?context=bWFzdGVyfGltYWdlc3wxMzQzN3xpbWFnZS9qcGVnfGltYWdlcy9oMGMvaDZmLzkyNDQ2NTMwOTI4OTQuanBnfDNmYTJlNzY0NzYzMWQyODI5NTU3ZDAxNjYzZTFiZmNiYmRhZWVjY2FjM2M3MTAyMzcyYjEwMTJkZjVjZWU4ZTM">
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Equipo</label>
                        <select id="equipo" name="equipo" class="form-control" required>
                            <option value="ESTABILIZADOR" selected>ESTABILIZADOR</option>
                            <option value="UPC">UPC</option>
                        </select>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Codigo Patrimonial</label>
                        <input id="patrimonio" name="patrimonio" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Marca</label>
                        <input id="marca" name="marca" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 col-5">
                        <h3><label for="" class="form-label">Estado</label></h3><br>
                        <select id="estado" name="estado" class="form-control" required>
                            <option hidden selected>Selecciona una opción</option>
                            <option value="OPERATIVO">OPERATIVO</option>
                            <option value="INOPERATIVO">INOPERATIVO</option>
                        </select>
                        {{-- <input id="estado2" name="estado2" type="text" class="form-control" required> --}}
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