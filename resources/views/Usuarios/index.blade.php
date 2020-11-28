@extends('adminlte::page')

@section('title', 'Usuarios')
@section('plugins.Sweetalert2',true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>USUARIOS</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@stop

@section('content')
    <!-- Default box -->
    <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                <span class="fa fa-fw fa-plus"></span>
                NUEVO USUARIO</h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>

              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">

                <form role="form" id="formulario" enctype="multipart/form-data" autocomplete="off">

                    <input type="hidden" id="txtOpcion" name="txtOpcion">
                    @csrf

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
                                <option>Seleciona un cargo</option>
                                @foreach ($cargos as $cargo)
                                <option value="{{$cargo['id']}}"">{{$cargo['cargo']}}</option>

                                @endforeach



                                </select>
                        </div>
                        <div class="form-group">

                            <div class="input-group">
                              <div class="custom-file">
                                <input type="hidden" name="fotoSinEditar" id="fotoSinEditar" >
                                <input type="file" class="custom-file-input nuevaFoto"  name="nuevaFoto"   id="exampleInputFile" >
                                <label class="custom-file-label" for="exampleInputFile">Agregar Foto</label>
                              </div>

                            </div>
                            <p class="text-muted font-13 m-b-30">
                                Peso Maximo de la foto 2MB
                            </p>
                            <img src="img/usuarios/default/anonymousoficial.png"  alt="" id="previsualizar" class="img-thumbnail avatar-xl previsualizar">
                        </div>



                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light" id="btnEditar">Guardar</button>


                </form>


              </div>

            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>


    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">LISTA DE USUARIOS</h3>

          </div>
         <div class="card-body pb-0">
             {{-- <div class="row d-flex align-items-stretch">
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch pb-3">
                    <button type="button" class="btn btn-success width-xl waves-effect waves-light float-right" onClick="abrirModal();" id="btnAbrirModal"><i
                        class="mdi mdi-plus-circle mr-1"></i>Agregar Usuario</button>

                </div>
             </div> --}}
              <div class="row d-flex align-items-stretch">
                @foreach ($usuarios as $user)
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">
                    {{$user->cargo->cargo}}
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                          @php
                              $fullname = $user['name'];
                              $arrayname = explode(' ',$fullname);
                              $name=$arrayname[0];
                          @endphp
                        <h2 class="lead"><b>{{$name.' '.$user['aPaterno']}}</b></h2>
                        <p class="text-muted text-sm"><b>Ultimo Logueo: </b> {{$user['ultimoLogeo']}} </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <b>DIRECCIÓN: </b>{{$user['direccion']}}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>CELULAR #:</b> {{$user['nCelular']}}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span> <b>DNI #:</b> {{$user['dni']}}</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="{{$user['avatar']}}" alt="" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                    <a href="#" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                      </a>
                    <a href="#" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="usuarios/detalle/{{$user['id']}}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>

        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
                {{$usuarios->links()}}


            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
      @include('Usuarios.modal')
@stop

@section('css')

@stop

@section('js')
<script src="{{asset('vendor/bs-custom-file-input/bs-custom-file-input.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function () {
  bsCustomFileInput.init();
});

function abrirModal() {


    let opcion = 2;
    let cabeceraModal = document.getElementById("cabeceraM");
    cabeceraModal.classList.remove("bg-success");
    cabeceraModal.classList.add("bg-dark");
    document.getElementById("tituloModal").innerText = "Agregar Nuevo Usuario";
    document.getElementById("txtUsuario").readOnly = false;
    document.getElementById("btnEditar").innerText = "Guardar Usuario";
    document.getElementById("formulario").reset();

    document.getElementById("previsualizar").setAttribute("src","img/usuarios/default/anonymousoficial.png");
    document.getElementById("txtOpcion").value = opcion;

    $("#con-close-modal").modal("show");

}

/* ======================================
EVENTO SUBMIT PARA AGREGAR Y EDITAR USUARIO
====================================== */

const form = document.getElementById('formulario');
form.addEventListener('submit',function(e){
    e.preventDefault();
    let data = new FormData(form);
    $("#con-close-modal").modal('hide');
    fetch("{{route('usuario.crear')}}",
        {method:"POST",
        body:data}).then(response => response.text())
                   .then(response =>{
                       console.log(response);
                       window.location.assign("{{url('usuarios?page=')}}"+response);
                   }
                    )




})



/* ======================================
VALIDANDO IMAGEN DE PERFIL
====================================== */

$(".nuevaFoto").change(function() {
    let imagen = this.files[0];
    /* ------------------------- */
    /* VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG */
    /* ------------------------- */

    if (imagen["type"] !== "image/jpeg" && imagen["type"] !== "image/png" && imagen["type"] !== "image/jpg") {
        $(".nuevaFoto").val("");
        Swal.fire({
            title:"Error al subir la imagen",
            text:"!La imagen debe estar en formato JPG o PNG!",
            icon:"error",
            confirmButtonText:"!Cerrar¡"
        });

    }else if (imagen["size"]>2000000) {
       $(".nuevaFoto").val("");
       Swal.fire({
           title:"Error al subir la imagen",
           text:"!La imagen no debe pesar mas de 2MB!",
           icon:"error",
           confirmButtonText:"!Cerrar¡"
       });

    }else{
        let datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load",function(event){
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src",rutaImagen);
        })
    }


})


</script>

@stop
