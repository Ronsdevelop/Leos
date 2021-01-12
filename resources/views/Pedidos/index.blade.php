@extends('adminlte::page')

@section('title', 'Pedidos')
@section('plugins.Datatables',true)
@section('plugins.Sweetalert2',true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>PEDIDOS</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Pedidos</a></li>
          <li class="breadcrumb-item active">Todos</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">

                    <h3 class="card-title">
                        <i class="fas fa-plus"></i>

                         AGREGAR PEDIDO

                    </h3>
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
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">CLIENTE</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="addCliente"  >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">TURNO</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" id="turno">
                                                @foreach ($turnos as $turno)
                                                <option>{{$turno['turno']}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">RECIPIENTE</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" id="recipiente">
                                                @foreach ($recipientes as $recipiente)
                                                <option>{{$recipiente['recipiente']}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label text-right">FECHA</label>
                                        <div class="col-sm-6">
                                        <input type="date" class="form-control" id="inputPassword3"  >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label text-right">OBSERVACION</label>
                                        <div class="col-sm-6">
                                        <textarea name="" id="" class="form-control" cols="30" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label text-right">AGREGAR PRODUCTO</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-barcode"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg" id="addProducto">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fas fa-plus-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                    <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped table-sm table-bordered">
                                            <thead >
                                                <tr class="bg-info">
                                                    <th class="text-center">Item</th>
                                                    <th class="text-center">Producto</th>
                                                    <th class="text-center">Cantidad</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">Call of Duty</td>
                                                    <td class="text-center">455-981-221</td>
                                                    <td class="text-center">$64.50</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">Need for Speed IV</td>
                                                    <td class="text-center">247-925-726</td>
                                                    <td class="text-center">$50.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">Monsters DVD</td>
                                                    <td class="text-center">735-845-642</td>
                                                    <td class="text-center">$10.70</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">Grown Ups Blue Ray</td>
                                                    <td class="text-center">422-568-642</td>
                                                    <td class="text-center">$25.99</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="bg-gray">
                                                    <th class="text-right" colspan="3">TOTAL DE PEDIDO</th>
                                                    <th class="text-center">0.00</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
         <!-- /.col-->
        </div>
      <!-- ./row -->
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">LISTA DE PEDIDOS EN GENERAL</h3>

                </div>
        <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover  table-sm" id="tablaPedidos">   <!--id="tickets-table" data-toggle="modal" data-target="#con-close-modal"-->
                        <thead class="thead-dark">
                        <tr class="text-sm">
                            <th >
                                ID
                            </th>
                            <th >CLIENTE</th>
                            <th >FECHA</th>
                            <th >MONTO</th>
                            <th >TURNO</th>
                            <th >ESTADO</th>
                            <th >OBSERVACIONES</th>
                            <th class="text-center" width="80px">VER</th>
                            <th class="text-center" width="80px">EDITAR</th>
                            <th class="text-center" width="80px">BORRAR</th>
                        </tr>
                        </thead>

                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr class="text-sm">
                            <th>
                                ID
                            </th>
                            <th>CLIENTE</th>
                            <th>FECHA</th>
                            <th>MONTO</th>
                            <th>TURNO</th>
                            <th>ESTADO</th>
                            <th>OBSERVACIONES</th>
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
<link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">



@stop

@section('js')
<script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }} "></script>
<script type="text/javascript">

 $("#addCliente").autocomplete({
     source:function(request,response) {
         $.ajax({
             url: "{{route('pedido.cliente')}}",
             data: {
                 term:request.term
             },
             dataType: "json",
             success: function (data) {
                 response(data);
             }
         });

     }
 });
 $("#addProducto").autocomplete({
     source:function(request,response) {
         $.ajax({
             url: "{{route('pedido.producto')}}",
             data: {
                 term:request.term
             },
             dataType: "json",
             success: function (data) {
                 response(data);
             }
         });

     }
 });


$(document).ready(function () {
    $('#turno').select2();
    $('#recipiente').select2();
    $('#tablaPedidos').DataTable({
                    paging: true,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    responsive: true,
                    language: {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en Clientes",
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
                        "url": "{{route('pedido.lista')}}",
                        "dataSrc":""
                    },
                    columns: [
                      {data: "ID" },
                      {data: "Cliente"},
                       {data: "Fecha"},
                       {data: "Monto"},
                       {data: "Turno"},
                       {data: "Estado"},
                       {data: "Observaciones"},
                       {data: "Ver"},
                       {data: "Editar"},
                       {data: "Eliminar"}

                    ]

});




    $(document).on('click','.btn-detalle', function () {
        let codPedido = $(this).attr('idPedido');

        let url = "{{url('pedidos/detalle')}}/"+codPedido;;
        fetch(url,{
            method:'GET',
        }).then(resp => resp.json())
        .then(resp=>{
            cargardetallepedido(resp);
        })


    });
    function cargardetallepedido(datos) {
        console.log(datos);


  let info= "";
        datos.forEach((element,index) => {

            if (index != 0) {
            info+=`
            <tr>
                <td>${element['nombre']}</td>
                <td>${element['cantidad']}</td>
            </tr>
             `;}

            } );

             document.getElementById('titulocliente').innerHTML='LISTA DE '+datos[0]['alias'];
             document.getElementById('datos').innerHTML = info;




    }


});

</script>

@stop
