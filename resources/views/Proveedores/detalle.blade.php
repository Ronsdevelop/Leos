@extends('adminlte::page')

@section('title', $proveedor['rason'])

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">PERFIL DE {{$proveedor['rason']}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{'/proveedor'}}">Proveedores</a></li>
            <li class="breadcrumb-item active" id="menucabe">{{$proveedor['rason']}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
         <!-- /.col -->
      <div class="col-md-5 col-12">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info " >
               <h3 class="widget-user-username text-left font-weight-bold">{{$proveedor["rason"]}}</h3>
                <h6 class="widget-user-desc text-left">Desde : {{$proveedor["created_at"]}} </h6>

          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="/img/sistema/proveedor.png" alt="User Avatar">  
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">3,200</h5>
                  <span class="description-text">TOTAL FACTURAS</span>
                </div>
                <!-- /.description-block -->
              </div>


              <!-- /.col aqui tambien -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                <a id="edit-supplier" class="btn btn-block btn-primary" href="#" title="Lista de Productos">
                <i class="fa fa-list"></i>   Productos                 </a>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                <button id="edit-supplier" class="btn btn-block btn-success btn-editarPro" idProveedor="{{$proveedor['id']}}" title="EDITAR">
                <i class="fas fa-edit text-light  "></i>
              </button>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
       <!-- /.col -->
       <div class="col-md-4">
        <div class="card card-outline card-primary">
          <div class="card-header ">
            <h6 class="widget-user-username text-center font-weight-bold">Contacto e Información</h6>
          </div>
          <div class="card-body">
            <div class=" text-center ">

                <div class="p-0">
                    <h6><strong>CELULAR : </strong>{{$proveedor["nCelula"]}}</h6>
                    <h6><strong>TELEFONO : </strong>{{$proveedor["nFono"]}}</h6>
                    <h6><strong>DIRECCION : </strong>{{$proveedor["direccion"]}}</h6>
                    <h6><strong>CONTACTO : </strong>{{$proveedor["contacto"]}}</h6>
                    <h6><strong>REFERENCIA : </strong>{{$proveedor["referencia"]}}</h6>
                    <h6><strong>EMAIL : </strong>{{$proveedor["email"]}}</h6>

                </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-3 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Bookmarks</span>
            <span class="info-box-number">410</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Bookmarks</span>
            <span class="info-box-number">410</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

    </div>
    <!-- /.row -->

    <div class="row">
    <div class="col-12 col-sm-12">
        <div class="card ">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#acustom-tabs-four-tabContent" data-toggle="tab">Activity</a></li>
              <li class="nav-item"><a class="nav-link" href="#custom-tabs-four-profile" data-toggle="tab">Timeline</a></li>
              <li class="nav-item"><a class="nav-link" href="#custom-tabs-four-messages" data-toggle="tab">Settings</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
              <table id="tbFacompras" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                    <td>5</td>
                    <td>C</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.5
                    </td>
                    <td>Win 95+</td>
                    <td>5.5</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 6
                    </td>
                    <td>Win 98+</td>
                    <td>6</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet Explorer 7</td>
                    <td>Win XP SP2+</td>
                    <td>7</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>AOL browser (AOL desktop)</td>
                    <td>Win XP</td>
                    <td>6</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Gecko</td>
                    <td>Firefox 1.0</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.7</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Gecko</td>
                    <td>Firefox 1.5</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
              <table id="tbFapendentes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                    <td>5</td>
                    <td>C</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.5
                    </td>
                    <td>Win 95+</td>
                    <td>5.5</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 6
                    </td>
                    <td>Win 98+</td>
                    <td>6</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet Explorer 7</td>
                    <td>Win XP SP2+</td>
                    <td>7</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>AOL browser (AOL desktop)</td>
                    <td>Win XP</td>
                    <td>6</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Gecko</td>
                    <td>Firefox 1.0</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.7</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Gecko</td>
                    <td>Firefox 1.5</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.8</td>
                    <td>A</td>
                  </tr>



                  </tfoot>
                </table>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
              <div class="col-md-12">
        <!-- AREA CHART -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Area Chart</h3>


                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                  </div>
            <!-- /.card-body -->
                  </div>
        <!-- /.card -->
            </div>
              </div>

            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->


@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
