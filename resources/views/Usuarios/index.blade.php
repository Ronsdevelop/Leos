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


    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title"><b>LISTA DE USUARIOS</b></h3>
            <button type="button" class="btn btn-success width-xl waves-effect waves-light float-right" onClick="abrirModal();" id="btnAbrirModal"><i
                class="mdi mdi-plus-circle mr-1"></i>AGREGAR USUARIO</button>

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
                        <a href="#" class="btn btn-sm btn-warning">
                             Permisos
                        </a>
                        <a href="#" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>

                    <button   class="btn btn-sm btn-success btn-editar" idusuario="{{$user['id']}}">
                            <i class="fas fa-edit"></i>
                        </button>
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

    /* ------------------------- */
    /* EDITAR PROVEEDOR  */
    /* ------------------------- */

    $(document).on("click",".btn-editar", function () {
        let codUser = $(this).attr("idusuario");
        document.getElementById("txtOpcion").value = "EDIT";
        let cabeceraModal = document.getElementById("cabeceraM");
        cabeceraModal.classList.remove("bg-dark");
        cabeceraModal.classList.add("bg-success");

        $("#txtNombresError").addClass('d-none');
        $("#txtApaternoError").addClass('d-none');
        $("#txtAmaternoError").addClass('d-none');
        $("#txtDireccionError").addClass('d-none');
        $("#txtDniError").addClass('d-none');
        $("#txtCelularError").addClass('d-none');
        $("#txtFechaError").addClass('d-none');
        $("#txtUsuarioError").addClass('d-none');
        $("#passwordActualError").addClass('d-none');
        $("#fotoSinEditarError").addClass('d-none');
        $("#selecTCargoError").addClass('d-none');
        $("#previsualizarError").addClass('d-none');



    document.getElementById("tituloModal").innerText = "Editar Usuario";

    document.getElementById("btnEditar").innerText = "Actualizar Usuario";


        const data = new FormData();

        data.append('codigoUser',codUser);
        $("#con-close-modal").modal("show");

    let url = "{{url('usuarios/datosuser')}}/"+codUser;



/*     $.ajax({
        type: "GET",
        url: url,
        success: function (response) {
            console.log(response);
        }
    }); */

   fetch(url,{
        method:'GET'
    }).then(resp=> resp.json())
    .then(response =>{
        cargarDatos(response);
    });

    });



    /* ------------------------- */
    /* FUNCION PARA ASIGNAR LOS DATOS A CADA ELEMENTO DEL MODAL EDITAR USURAIO*/
    /* ------------------------- */

    function cargarDatos(datos) {
        document.getElementById("txtNombres").value = datos["name"];
        document.getElementById("txtApaterno").value = datos["aPaterno"];
        document.getElementById("txtAmaterno").value = datos["aMaterno"];
        document.getElementById("txtDireccion").value = datos["direccion"];
        document.getElementById("txtDni").value = datos["dni"];
        document.getElementById("txtCelular").value = datos["nCelular"];
        document.getElementById("txtFecha").value = datos["fIngreso"];
        document.getElementById("txtUsuario").value = datos["user"];
        document.getElementById("passwordActual").value = datos["password"];
        document.getElementById("fotoSinEditar").value = datos["avatar"];
        document.getElementById("txtCorreo").value = datos["email"];
        document.getElementById("selecTCargo").selectedIndex = datos["cargos_id"];
        if (datos["avatar"] != "") {
            document.getElementById("previsualizar").setAttribute("src",datos["avatar"]);
    }


    }


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
