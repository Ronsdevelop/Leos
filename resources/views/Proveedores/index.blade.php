@extends('adminlte::page')

@section('title', 'Proveedores')
@section('plugins.Datatables',true)
@section('plugins.Sweetalert2',true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>PROVEEDORES</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Almacen</a></li>
          <li class="breadcrumb-item active">Proveedores</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">LISTA DE PROVEEDORES</h3>
                        <button type="button" class="btn btn-dark width-xl waves-effect waves-light float-right" onClick="abrirModalProveedor();" id="btnAbrirModal"><i
                                            class="mdi mdi-plus-circle mr-1"></i>AGREGAR PROVEEDOR</button>
                    </div>
            <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover  table-sm" id="tablaProveedor">   <!--id="tickets-table" data-toggle="modal" data-target="#con-close-modal"-->
                            <thead class="thead-dark">
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>RAZON SOCIAL</th>
                                <th>DIRECCION</th>
                                <th>CONTACTO</th>
                                <th>CELULAR</th>
                                <th class="text-center" width="80px" >COMPRAR</th>
                                <th class="text-center" width="80px">VER</th>
                                <th class="text-center" width="80px">EDITAR</th>
                                <th class="text-center" width="80px">BORRAR</th>
                            </tr>
                            </thead>

                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>RAZON SOCIAL</th>
                                <th>DIRECCION</th>
                                <th>CONTACTO</th>
                                <th>CELULAR</th>
                                <th>COMPRAR</th>
                                <th>VER</th>
                                <th>EDITAR</th>
                                <th>BORRAR</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
            <!-- /.card-body -->
                </div>
            <!-- /.card -->

            <!-- /.card -->
            </div>
        <!-- /.col -->
        </div>
    <!-- /.row -->


    </div>
    <!-- /.container-fluid -->
    @include('Proveedores.modal')

@stop

@section('css')

@stop

@section('js')

<script type="text/javascript">
window.CSRF_TOKEN = '{{ csrf_token() }}';

function abrirModalProveedor(){
    let cabeceraModal = document.getElementById("diModal");
    cabeceraModal.classList.remove("bg-success");
    cabeceraModal.classList.add("bg-dark");
    document.getElementById("tituloModal").innerText = "Agregar Proveedor";
    document.getElementById("btnEditar").innerText = "Guardar Proveedor";
    document.getElementById("formulario").reset();
    document.getElementById("txtOpcion").value = "ADD";
    $("#txtRazonError").addClass('d-none');
    $("#txtDireccionError").addClass('d-none');
    $("#txtContactoError").addClass('d-none');
    $("#txtIndetificacionError").addClass('d-none');
    $("#txtCelularError").addClass('d-none');
    $("#txtFijoError").addClass('d-none');
    $("#txtCorreoError").addClass('d-none');
    $("#txtReferenciaError").addClass('d-none');

    $("#con-close-modal").modal("show");

    }


    const form = document.getElementById('formulario');
    form.addEventListener('submit',function(e){
    e.preventDefault();
    let data = new FormData(form);


    let opcion = $('#txtOpcion').val();

    let ruta = "";
    if (opcion==='ADD') {
        ruta ="{{route('proveedores.crear')}}";

    }
    if (opcion==='EDIT') {
        data.append('_method',"PATCH");
        ruta ="{{route('proveedores.edit')}}";
    }

    $.ajax({
        type:'POST',
        headers: {'X-CSRF-TOKEN': window.CSRF_TOKEN},
        url: ruta,
        data:data,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            $("#con-close-modal").modal('hide');
            $('#tablaProveedor').DataTable().ajax.reload();

        },
        error: function(response){
            let errors = response.responseJSON;
            if ($.isEmptyObject(errors)==false) {
                $.each(errors.errors, function(key,value){
                    let ErrorID ='#'+key+'Error';
                    $(ErrorID).removeClass('d-none');
                    $(ErrorID).text(value);
                })
            }

        }
    });

  /*   fetch(ruta,
        {method:"POST",
        body:data}).then(response => response.text())
                .then(response =>{
               $('#tablaProveedor').DataTable().ajax.reload();
                }
                ); */







});



$(document).ready(function() {

    /* ------------------------- */
    /* EDITAR PROVEEDOR  */
    /* ------------------------- */

    $(document).on("click",".btn-editarPro", function () {
        let codProveedor = $(this).attr("idProveedor");
        document.getElementById("txtOpcion").value = "EDIT";
        let cabeceraModal = document.getElementById("diModal");
        cabeceraModal.classList.remove("bg-dark");
        cabeceraModal.classList.add("bg-success");

        $("#txtRazonError").addClass('d-none');
        $("#txtDireccionError").addClass('d-none');
        $("#txtContactoError").addClass('d-none');
        $("#txtIndetificacionError").addClass('d-none');
        $("#txtCelularError").addClass('d-none');
        $("#txtFijoError").addClass('d-none');
        $("#txtCorreoError").addClass('d-none');
        $("#txtReferenciaError").addClass('d-none');
    document.getElementById("tituloModal").innerText = "Editar Usuario";

    document.getElementById("btnEditar").innerText = "Actualizar Usuario";


        const data = new FormData();

        data.append('codigoProv',codProveedor);
        $("#con-close-modal").modal("show");

    let url = "{{url('proveedor/datosprov')}}/"+codProveedor;



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
        cargarDatosProveedor(response);
    });

    });



    /* ------------------------- */
    /* FUNCION PARA ASIGNAR LOS DATOS A CADA ELEMENTO DEL MODAL EDITAR USURAIO*/
    /* ------------------------- */

    function cargarDatosProveedor(datos) {
        document.getElementById("txtRazon").value = datos["rason"];
        document.getElementById("txtDireccion").value = datos["direccion"];
        document.getElementById("txtContacto").value = datos["contacto"];
        document.getElementById("txtIndetificacion").value = datos["ruc"];
        document.getElementById("txtCelular").value = datos["nCelula"];
        document.getElementById("txtFijo").value = datos["nFono"];
        document.getElementById("txtCorreo").value = datos["email"];
        document.getElementById("txtReferencia").value = datos["referencia"];
        document.getElementById("txtId").value = datos["id"];

    }


$('#tablaProveedor').DataTable({
                    paging: true,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    responsive: true,
                    language: {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en Proveedores",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },


                    },

                    ajax:{
                        "url": "{{route('proveedor.lista')}}",
                        "dataSrc":""
                    },
                    columns: [
                      {data: "ID" },
                      {data: "Rason"},
                       {data: "Direccion"},
                       {data: "Contacto"},
                       {data: "Celular"},
                       {data: "Comprar"},
                       {data: "Ver"},
                       {data: "Editar"},
                       {data: "Eliminar"}

                    ]

});

/* ======================================
FUNCION PARA ELIMINAR PROVEEDOR
====================================== */

$(document).on("click",".btn-eliminarPro", function () {
let codProveedor = $(this).attr("idProveedor");
const datos = new FormData();
datos.append('_method','DELETE');
datos.append('codigo',codProveedor)
let ruta ="{{route('proveedores.delete')}}";

Swal.fire({
    title: 'Seguro que deseas elimar el Proveedor?',
    text: "Se eliminara totalmente de la base de datos!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, eliminar!'
  }).then((result) => {
      if (result.value) {
          $.ajax({
            type:'POST',
            headers: {'X-CSRF-TOKEN': window.CSRF_TOKEN},
            url: ruta,
            data:datos,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                confirmarEliminacionProveedor(response);

              }
          });
           /*  fetch(url,{
                headers: {'X-CSRF-TOKEN': window.CSRF_TOKEN},
                method:'POST',
                body: datos

            }).then(resp => resp.text())
            .then(response => {
                console.log(response);
                confirmarEliminacionProveedor(response);
            }) */
    }


    });
});


function confirmarEliminacionProveedor(respuesta){


if (respuesta === "ok"){
    Swal.fire({
        icon:"success",
        title:"Se Elimino correctamente",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
    }).then(function(result){

        if(result.value){
            $('#tablaProveedor').DataTable().ajax.reload();

        }

    });


}else{
    $('#tablaProveedor').DataTable().ajax.reload();
    Swal.fire(
        'No se pudo Eliminar!',
        'El Proveedor no se a eliminado de la base de datos.',
        'error')

  }
}






     });




</script>


@stop
