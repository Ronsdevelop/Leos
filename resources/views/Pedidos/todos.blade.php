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
                        <h3>{{$pedido['monto']}}</h3>

                        <p>{{$pedido->alias->alias}}</p>
                    </div>
                    <div class="icon">
                        <i class="icon {{$pedido->recipiente->icono}}"></i>
                    </div>
                        <a href="#" class="small-box-footer">Detalle Pedido <i class="fas fa-eye"></i></a>
                </div>
            </div>

        @endforeach



    </div>

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
