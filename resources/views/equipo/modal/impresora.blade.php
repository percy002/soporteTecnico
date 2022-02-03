<form action="{{route('equipos.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreateImpresora" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:teal">
                    <h4 class="modal-title">{{__('Creando nueva impresora') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color:Azure">
                    <img Align="right" width="320" height="230" src="https://product-images.www8-hp.com/digmedialib/prodimg/lowres/c06405698.png">
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Equipo</label>
                        <select id="equipo" name="equipo" class="form-control" required>
                            <option value="IMPRESORA" selected>IMPRESORA</option>
                            <option value="ESCANNER">ESCANNER</option>
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
                    <div class="mb-3 col-4">
                        <label for="" class="form-label">Tipo</label>
                        <select id="tipo" name="tipo" class="form-control"required>
                            <option hidden selected>Selecciona una opción</option>
                            <option value="Laser">Laser</option>
                            <option value="Matrisial">Matrisial</option>
                            <option value="Tinta">Tinta</option>
                        </select>
                    </div>
                    <img Align="right" width="320" height="230" src="https://mediaserver.goepson.com/ImConvServlet/imconv/367d11aa327de16f51ea7f97fd57bbe5b4c503c0/1200Wx1200H?use=banner&assetDescr=19Lin_FAL_Black_13_1">
                   

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