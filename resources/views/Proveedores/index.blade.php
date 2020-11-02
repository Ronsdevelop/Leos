@extends('adminlte::page')

@section('title', 'Proveedores')
@section('plugins.Datatables',true)

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
                        <h3 class="card-title">PROVEEDORES DE LA PANADERIA</h3>
                        <button type="button" class="btn btn-dark width-xl waves-effect waves-light float-right" onClick="abrirModalProveedor();" id="btnAbrirModal"><i
                                            class="mdi mdi-plus-circle mr-1"></i>Agregar Proveedor</button>
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

@stop

@section('css')

@stop

@section('js')


    <script>
    $(document).ready(function() {
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

    function abrirModalProveedor(){

        let opcion = 2;
        let cabeceraModal = document.getElementById("diModal");
        cabeceraModal.classList.remove("bg-success");
        cabeceraModal.classList.add("bg-dark");
        document.getElementById("tituloModal").innerText = "Agregar Proveedor";
        document.getElementById("btnEditar").innerText = "Guardar Proveedor";
        document.getElementById("formulario").reset();

        document.getElementById("txtOpcion").value = opcion;

        $("#con-close-modal").modal("show");

          }



         });


    </script>
@stop
