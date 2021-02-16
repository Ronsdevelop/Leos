<form id="create-customer-form" class="form-horizontal" action="customer.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="txtId" id="txtId" value="{{$cliente['id']}}">
    <input type="hidden" id="txtOpcion">
    <div class="box-body">

      <div class="form-group">
        <label for="customer_name" class="col-sm-3 control-label">
          Razon Social<i class="required">*</i>
        </label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="txtRazon" id="txtRazon" value="{{$cliente['nombre_razon']}}" placeholder="Nombre o Razon Social Cliente">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_name" class="col-sm-3 control-label">
          Dirección
        </label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Direccion Cliente">
        </div>
      </div>
      <div class="form-group">
        <label for="status" class="col-sm-3 control-label">
          Tipo de Documento
        </label>
        <div class="col-sm-7">
          <select id="status" class="form-control" name="status" >
            <option>Seleciona un Tipo de Documento</option>
            @foreach ($identificacion as $tipo)

            <option value="{{$tipo['id']}}"">{{$tipo['identificacions']}}</option>

            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="customer_name" class="col-sm-3 control-label">
          Dirección
        </label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="txtDoc" id="txtDoc" placeholder="DNI O RUC">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_name" class="col-sm-3 control-label">
          Alias para Consulta
        </label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="txtAlias" id="txtAlias" placeholder="Alias para Consultas">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_name" class="col-sm-3 control-label">
          Contacto
        </label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="txtContacto" id="txtContacto" placeholder="Representante para Consultas">
        </div>
      </div>

      <div class="form-group">
        <label for="status" class="col-sm-3 control-label">
          Tipo de Cliente
        </label>
        <div class="col-sm-7">
          <select id="status" class="form-control" name="status" >
            <option>Seleciona un Tipo de Cliente</option>
            @foreach ($tipoCliente as $tipo)

            <option value="{{$tipo['id']}}"">{{$tipo['tipo']}}</option>

            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="customer_name" class="col-sm-3 control-label">
          Celular
        </label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="txtCelular" id="txtCelular" placeholder="Celular">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_name" class="col-sm-3 control-label">
          Cumpleaños
        </label>
        <div class="col-sm-7">
            <input type="date" class="form-control" name="txtCumple" id="txtCumple" >
        </div>
      </div>
      <div class="form-group">
        <label for="customer_name" class="col-sm-3 control-label">
          Email
        </label>
        <div class="col-sm-7">
            <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="Direccion de email">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_name" class="col-sm-3 control-label">
          Referencia
        </label>
        <div class="col-sm-7">
            <textarea class="form-control" name="txtReferencia" id="txtReferencia" cols="30" rows="1" placeholder="Referencia del local"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-7">
          <button class="btn btn-info" id="create-customer-submit" type="submit" name="create-customer-submit" data-form="#create-customer-form" data-loading-text="Saving...">
            <span class="fa fa-fw fa-save"></span>
            Guardar
          </button>
          <button type="reset" class="btn btn-danger" id="reset" name="reset"><span class="fa fa-fw fa-circle-o"></span>
            Resetear
          </button>
        </div>
      </div>

    </div>
  </form>
