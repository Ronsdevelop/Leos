  <!-- MODAL AGREGAR PROVEEDOR -->

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div id="diModal" class="modal-content bg-dark">

            <form role="form" id="formulario" enctype="multipart/form-data" autocomplete="off">

                <div id="cabeceraM" class="modal-header">

                    <h5 class="modal-title" id="tituloModal"><span class="fa fa-pencil-alt"></span> Agregar Ciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close" aria-hidden="true"><span aria-hidden="true">&times;</span></button></button>
                </div>

                <input type="hidden" name="txtId" id="txtId">
                <input type="hidden" id="txtOpcion">

                <div class="modal-body">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user" title="RAZON SOCIAL O NOMBRE"></i></span>
                        </div>
                            <input type="text" class="form-control" name="txtRazon" id="txtRazon" placeholder="Nombre o Razon Social Cliente">
                    </div>
                    <div class="alert alert-warning" role="alert" id="txtRazonError" ></div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked" title="DIRECCIÓN"></i></span>
                        </div>
                            <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Direccion Cliente">

                    </div>
                    <div class="alert alert-warning" role="alert" id="txtDireccionError" ></div>
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control" name="txtTipoIdentificacion" id="selecTIdentificacion"  data-toggle="select2">
                                <option>Seleciona un Tipo de Documento</option>
                                @foreach ($identificacion as $tipo)

                                <option value="{{$tipo['id']}}"">{{$tipo['identificacions']}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone-square" title="DNI O RUC"></i></span>
                                </div>
                                    <input type="text" class="form-control" name="txtDoc" id="txtDoc" placeholder="DNI O RUC">
                                <div class="alert alert-warning" role="alert" id="txtDocError" ></div>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-id-card-alt" title="ALIAS DEL CLIENTE"></i></span>
                        </div>
                            <input type="text" class="form-control" name="txtAlias" id="txtAlias" placeholder="Alias para Consultas">
                    </div>
                    <div class="alert alert-warning" role="alert" id="txtAliasError" ></div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-id-card-alt" title="CONTACTO"></i></span>
                        </div>
                            <input type="text" class="form-control" name="txtContacto" id="txtContacto" placeholder="Representante para Consultas">

                    </div>
                    <div class="alert alert-warning" role="alert" id="txtContactoError" ></div>

                    <div class="input-group mb-3">

                        <select class="form-control" name="txtTipoCliente" id="selecTCliente"  data-toggle="select2">
                            <option>Seleciona un Tipo de Cliente</option>
                            @foreach ($tipoCliente as $tipo)

                            <option value="{{$tipo['id']}}"">{{$tipo['tipo']}}</option>

                            @endforeach
                        </select>


                    </div>
                    <div class="alert alert-warning" role="alert" id="selecTClienteError" ></div>


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
                                    <input type="date" class="form-control" name="txtCumple" id="txtCumple" >
                                <div class="alert alert-warning" role="alert" id="txtCumpleError" ></div>
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
