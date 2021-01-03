@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <h1>Pedidos del Día</h1>
@stop

@section('content')

    <div class="row">
        @foreach ($pedidosdia as $pedido)
        <div class="col-lg-3 col-6">
            <!-- small box -->
                <div class="small-box {{$pedido->TipoEstado->color}}">
                    <div class="inner">
                        <h3>S/ {{$pedido['monto']}}</h3>

                        <p>{{$pedido->alias->alias}}</p>
                    </div>
                    <div class="icon">
                        <i class="icon {{$pedido->recipiente->icono}}"></i>
                    </div>
                        <a href="#" class="small-box-footer btn-detalle" data-toggle="modal" data-target="#detallePedido" idPedido="{{$pedido['id']}}" >Detalle Pedido <i class="fas fa-eye"></i></a>
                </div>
            </div>

        @endforeach



    </div>

    <div class="modal fade" id="detallePedido">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="titulocliente"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <table class="table table-bordered"  id="Detalles" >
                 <thead>
                     <tr>
                         <th>PRODUCTO</th>
                         <th>CANTIDAD</th>
                     </tr>
                 </thead>
                 <tbody id="datos">

                 </tbody>

             </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Opciones
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Editar</a>
                <a class="dropdown-item" href="#">Pago de Pedido</a>
                <a class="dropdown-item" href="#">Recojo de Canasta</a>
                <a class="dropdown-item" href="#">Otros</a>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    {{--
         font-family: Flaticon;
    font-style: normal;
    font-size: 0.85em;
    line-height: 0.75em;
    vertical-align: 0.35em;
        --}}


@stop

@section('css')

<link rel="stylesheet" href="{{asset('vendor/iconspropios/style.css')}}">

@stop

@section('js')
<script type="text/javascript">


$(document).ready(function () {
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
