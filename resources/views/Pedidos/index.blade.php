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
                                                <input type="text" class="form-control form-control-lg autocomplete-product" data-type="p_name"  name="add_item"  id="add_item">
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
                                        <table class="table table-striped table-sm table-bordered" id="product-table">
                                            <thead >
                                                <tr class="bg-info">

                                                    <th class="text-center">Producto</th>
                                                    <th class="text-center">Cantidad</th>
                                                    <th class="text-center">Precio</th>
                                                    <th class="text-center">Total</th>
                                                    <th class="text-center"><i class="fa fa-trash"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr class="bg-gray">
                                                    <th class="text-right" colspan="4">TOTAL PANES</th>
                                                    <th class="text-center">
                                                         300
                                                    </th>
                                                </tr>
                                                <tr class="bg-gray">
                                                    <th class="text-right" colspan="4">TOTAL DE PEDIDO</th>
                                                    <th class="text-center" id="total">

                                                    </th>
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
 $("#add_item").autocomplete({
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

    },
    focusOpen: true,
    autoFocus: true,
    minLength: 0,
    select:function(event,ui) {

        var data = {
                itemId: ui.item.id,
                itemNombre: ui.item.value,
                itemCantidad: 1,
                itemPrecioU: ui.item.precio,
                tipoCliente:1


            };
            addProduct(data);






    },
    open: function () {
           /*      $(".ui-autocomplete").perfectScrollbar(); */
                if ($(".ui-autocomplete .ui-menu-item").length == 1) {
                    $(".ui-autocomplete .ui-menu-item:first-child").trigger("click");
                    $("#add_item").val("");
                    $("#add_item").focus();
                }
    },
    close: function () {
        $(document).find(".autocomplete-product").blur();
        $(document).find(".autocomplete-product").val("");
        $("#add_item").focus();
    },
 });
    $("#add_item").trigger("focus");

    $(document).on("change keyup blur", ".quantity, .unit-price", function (){
        id = $(this).data("id");
        totalTax = 0;
        total = 0;
        calcImporItem(id);
    });

    $(document).delegate(".remove", "click", function () {
        id = $(this).data("id");
        $("#"+id).remove();
        totalTax = 0;
        total = 0;

       /*  $scope._calculate(id); */
    });


var totalPrecio = 0;

var addProduct = function(data) {

        if (data.tipoCliente == 'exclusive') {
            totalPrecio = (parseFloat(data.itemPrecioU) * parseFloat(data.itemCantidad)) ;
        } else {
            totalPrecio = parseFloat(data.itemCantidad) * parseFloat(data.itemPrecioU);

        }
        let addItem =`
            <tr id="${data.itemId}">

                <td class="text-center" data-title="Available">
                    <input name="products[${data.itemId}][item_id]" type="hidden" class="item-id" value="${data.itemId}">
                    <input name="products[${data.itemId}][item_name]" type="hidden" class="item-name" value="${data.itemNombre}">

                    <span class="text-center available" id="available-${data.itemId}">${data.itemNombre}</span>
                </td>
                <td style="padding:2px;" data-title="Quantity">
                    <input class="form-control input-sm text-center quantity" name="products[${data.itemId}][quantity]" type="text" value="${data.itemCantidad}" data-id="${data.itemId}" id="quantity-${data.itemId}" onclick="this.select();"  ondrop="return false;" onpaste="return false;" onKeyUp="if(this.value<0){this.value='1';}">
                </td>
                <td style="padding:2px;min-width:80px;" data-title="Unit Price">
                    <input id="unit-price-${data.itemId}" class="form-control input-sm text-center unit-price" type="text" name="products[${data.itemId}][unit_price]" value="${data.itemPrecioU}" data-id="${data.itemId}" data-item="${data.itemId}" onclick="this.select();" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" onKeyUp="if(this.value<0){this.value='1';}">
                </td>
                <td class="text-right" data-title="Total">
                    <span class="subtotal" id="subtotal-${data.itemId}">${totalPrecio}</span>
                </td>
                <td class="text-center">
                    <i class="fa fa-times text-red pointer remove" data-id="${data.itemId}" title="Remove"></i>
                </td>
            </tr>

         `;

    /*
        total = parseFloat(total) + parseFloat(sellPrice); */

        // Update existing if find
        if ($("#"+data.itemId).length) {
            cantidad = $(document).find("#quantity-"+data.itemId);
            cantidad.val(parseFloat(cantidad.val()) + 1);
            precioUnitario = $(document).find("#unit-price-"+data.itemId);

            subTotal = $(document).find("#subtotal-"+data.itemId);
            subTotal.text( parseFloat(subTotal.text() + parseFloat(totalPrecio),2));
        } else {
            $(document).find("#product-table tbody").append(addItem);
        }

   /*      $("#total-tax").val(totalTax);
        $("#total-amount").val(total);
        $("#total-amount-view").text(window.formatDecimal(total,2));

        $scope._calculateTotalPayable(); */
    };

    let cantidad = 0;
    let precio = 0;
    let total = 0;

    function calcImporItem(id) {
        cantidad = $(document).find("#quantity-"+id);
        precio = $(document).find("#unit-price-"+id);
        total = parseFloat(cantidad.val()) * parseFloat(precio.val());
        console.log(total);

    }



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
