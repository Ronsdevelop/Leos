@extends('adminlte::page')

@section('title', 'Usuarios')

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


    <div class="card card-solid">
         <div class="card-body pb-0">
             <div class="row d-flex align-items-stretch">
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch pb-3">
                    <button type="button" class="btn btn-success width-xl waves-effect waves-light float-right" onClick="abrirModal();" id="btnAbrirModal"><i
                        class="mdi mdi-plus-circle mr-1"></i>Agregar Usuario</button>

                </div>
             </div>
              <div class="row d-flex align-items-stretch">
                @foreach ($usuarios as $user)
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">
                    ADMINISTRADOR
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>{{$user['name']}}</b></h2>
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
<script src="vendor/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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

</script>

@stop
