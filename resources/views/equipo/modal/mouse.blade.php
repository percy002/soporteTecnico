<form action="{{route('equipos.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreateMouse" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:teal">
                    <h4 class="modal-title">{{__('Creando nuevo mouse') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color:Azure">
                    <img Align="right" width="400" height="200" src="https://resource.logitechg.com/w_1000,c_limit,q_auto,f_auto,dpr_auto/d_transparent.gif/content/dam/gaming/en/products/pro-gaming-mouse/pro-wired-mouse-rgb-hero-new.png?v=1">
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Equipo</label>
                        <input id="equipo" name="equipo" type="text" value="MOUSE" readonly />
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
                            {{-- <option hidden selected>Selecciona una opción</option> --}}
                            <option value="USB">USB</option>
                            <option value="PS2">PS2</option>
                        </select>
                    </div>
                    <img Align="right" width="360" height="200" src="https://m.media-amazon.com/images/I/61omhLgunpL._AC_SY450_.jpg">
                   

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