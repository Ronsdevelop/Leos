@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <h1>Pedidos del Día</h1>
@stop

@section('content')

    <div class="row">
        @foreach ($pedidos as $pedido)
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
                        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-sm">Detalle Pedido <i class="fas fa-eye"></i></a>
                </div>
            </div>

        @endforeach



    </div>

    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detalle de Pedido de </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
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

@stop
