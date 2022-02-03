<form action="{{route('equipos.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreateParlante" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content"  style="background-color:teal">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Creando nuevo parlante') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color:Azure">
                    <img Align="right" width="380" height="330" src="https://m.media-amazon.com/images/I/8122Hd47nPL._AC_SY355_.jpg">
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Equipo</label>
                        <input id="equipo" name="equipo" type="text" value="PARLANTE" readonly />
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Codigo Patrimonial</label>
                        <input id="patrimonio" name="patrimonio" type="text" class="form-control" required>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Marca</label>
                        <input id="marca" name="marca" type="text" class="form-control" required>
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