  <!-- MODAL AGREGAR PROVEEDOR -->

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div id="diModal" class="modal-content bg-dark">

            <form role="form" id="formulario" enctype="multipart/form-data" autocomplete="off">

            <div id="cabeceraM" class="modal-header">

            <h5 class="modal-title" id="tituloModal"><span class="fa fa-pencil-alt"></span> Agregar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close" aria-hidden="true"><span aria-hidden="true">&times;</span></button></button>
            </div>

            <input type="hidden" name="txtId" id="txtId">
            <input type="hidden" id="txtOpcion">

            <div class="modal-body">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user" title="RAZON SOCIAL"></i></span>
                    </div>
                    <input type="text" class="form-control" name="txtRazon" id="txtRazon" placeholder="Razon Social Proveedor">
                </div>
                <div class="alert alert-warning" role="alert" id="txtRazonError" ></div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marked" title="DIRECCIÓN"></i></span>
                    </div>
                    <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Direccion Proveedor">

                </div>
                <div class="alert alert-warning" role="alert" id="txtDireccionError" ></div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-card-alt" title="CONTACTO"></i></span>
                    </div>
                    <input type="text" class="form-control" name="txtContacto" id="txtContacto" placeholder="Contacto para Consultas">

                </div>
                <div class="alert alert-warning" role="alert" id="txtContactoError" ></div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-id-card" title="RUC"></i></span>
                    </div>
                    <input type="text" class="form-control" name="txtIndetificacion" id="txtIndetificacion" placeholder="Ruc o Dni Proveedor">

                </div>
                <div class="alert alert-warning" role="alert" id="txtIndetificacionError" ></div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-mobile-alt" title="CELULAR"></i></span>
                            </div>
                            <input type="text" class="form-control" name="txtCelular" id="txtCelular" placeholder="Celular">
                            <div class="alert alert-warning" role="alert" id="txtCelularError" ></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone-square" title="FIJO"></i></span>
                            </div>
                            <input type="text" class="form-control" name="txtFijo" id="txtFijo" placeholder="Telefono fijo">
                            <div class="alert alert-warning" role="alert" id="txtFijoError" ></div>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">

                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-at" title="CORREO"></i></span>
                    </div>
                    <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="Direccion de email">
                </div>

                <div class="alert alert-warning" role="alert" id="txtCorreoError" ></div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search-location" title="REFERENCIA"></i></span>
                    </div>
                    <textarea class="form-control" name="txtReferencia" id="txtReferencia" cols="30" rows="1" placeholder="Referencia del local"></textarea>

                </div>
                <div class="alert alert-warning" role="alert" id="txtReferenciaError" ></div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light " data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-light" id="btnEditar">Guardar</button>
            </div>

            </form>

        </div>
    </div>
</div><!-- /.modal -->
