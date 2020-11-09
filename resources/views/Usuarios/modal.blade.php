
            <!-- MODAL AGREGAR USUARIO -->

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <form role="form" id="formulario" enctype="multipart/form-data" autocomplete="off">
                <div id="cabeceraM" class="modal-header bg-dark">
                    <h4 class="modal-title text-light" id="tituloModal">Agregar Nuevo Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <input type="hidden" id="txtOpcion" name="txtOpcion">
                @csrf
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user" title="NOMBRES COMPLETOS"></i></span>
                        </div>
                        <input type="text" class="form-control" name="txtNombres" id="txtNombres" placeholder="Nombres Completos">

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user" title="APELLIDO PATERNO"></i></span>
                                </div>
                                <input type="text" class="form-control" name="txtApaterno" id="txtApaterno" placeholder="Apellido Paterno">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user" title="APELLIDO MATERNO"></i></span>
                                </div>
                                <input type="text" class="form-control" name="txtAmaterno" id="txtAmaterno" placeholder="Apellido Materno">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marked" title="DIRECCIÓN"></i></span>
                        </div>
                        <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Direccion Proveedor">

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user" title="DNI"></i></span>
                                </div>
                                <input type="text" class="form-control" name="txtDni" id="txtDni" placeholder="Dni">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user" title="CELULAR"></i></span>
                                </div>
                                <input type="text" class="form-control" name="txtCelular" id="txtCelular" placeholder="Celular">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user" title="FECHA DE INGRESO"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name="txtFecha" id="txtFecha" placeholder="fecha">
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user" title="USUARIO"></i></span>
                                </div>
                                <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" placeholder="Usuario">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user" title="CONTRASEÑA"></i></span>
                                </div>
                                <input type="password" class="form-control" name="txtPass" placeholder="Ingrese Clave" autocomplete="off">
                                <input type="hidden" name="passwordActual" id="passwordActual">
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at" title="CORREO"></i></span>
                        </div>
                        <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="Direccion de email">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at" title="CORREO"></i></span>
                        </div>
                        <select class="form-control" name="txtTipo" id="selecTCargo"  data-toggle="select2">
                            <option>Seleciona</option>

                                <option value=""">OPCION 1</option>
                                <option value=""">OPCION 2</option>
                                <option value=""">OPCION 3</option>
                            </select>
                    </div>
                    <div class="form-group">

                        <div class="input-group">
                          <div class="custom-file">
                            <input type="hidden" name="fotoSinEditar" id="fotoSinEditar" >
                            <input type="file" class="custom-file-input nuevaFoto"  name="nuevaFoto"   id="exampleInputFile" >
                            <label class="custom-file-label" for="exampleInputFile">Agregar Foto</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Subir</span>
                          </div>
                        </div>
                        <p class="text-muted font-13 m-b-30">
                            Peso Maximo de la foto 2MB
                        </p>
                        <img src="img/usuarios/default/anonymousoficial.png"  alt="" id="previsualizar" class="img-thumbnail avatar-xl previsualizar">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light" id="btnEditar">Guardar</button>
                </div>

            </form>

        </div>
    </div>
</div><!-- /.modal -->
