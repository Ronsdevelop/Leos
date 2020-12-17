@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">
        <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>10.00</h3>

                    <p>Las Rejas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                </div>
                    <a href="#" class="small-box-footer">Detalle<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
        <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
        <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="flaticon-wicker-basket" aria-hidden="true"></i>
                </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


@stop

@section('css')
<link rel="stylesheet" href="{{asset('vendor/iconsfont/font/flaticon.css')}}">

@stop

@section('js')

@stop
