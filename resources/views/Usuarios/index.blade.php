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
                @foreach ($usuarios as $item)
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">
                    Digital Strategist
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>{{$item['name']}}</b></h2>
                        <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="{{$item['avatar']}}" alt="" class="img-circle img-fluid">
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
                      <a href="#" class="btn btn-sm btn-primary">
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
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
