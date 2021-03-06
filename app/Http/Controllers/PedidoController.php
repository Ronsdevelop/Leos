<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\DetallePedido;
use App\Pedido;
use App\Producto;
use App\RecipienteEntrega;
use App\Turno;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $turnos = Turno::All();
        $recipientes = RecipienteEntrega::all();
     return view('Pedidos.index', compact('turnos'),compact('recipientes'));
    }


    public function list()
    {
        $respuesta=DB::table('pedidos')->join('clientes','clientes.id','=','pedidos.cliente_id')->join('turnos','turnos.id','=','pedidos.turno_id')->join('tipo_estado','tipo_estado.id','=','pedidos.estado_id')->select('pedidos.id','clientes.alias','pedidos.fPedido','pedidos.monto','turnos.turno','tipo_estado.estado','pedidos.observaciones')->get();



        $pedidos = array();
        foreach ($respuesta as $key => $pedido) {
            $observa = is_null($pedido->observaciones)?'NINGUNA':$pedido->observaciones;

            $pedidos[$key] =[
                "DT_RowId"=>"row_".$pedido->id,
                "ID" => $pedido->id,
                "Cliente" => $pedido->alias,
                "Fecha" => $pedido->fPedido,
                "Monto" => $pedido->monto,
                "Turno" => $pedido->turno,
                "Estado" => $pedido->estado,
                "Observaciones" => $observa,
                "Ver" => "<a class='btn btn-sm btn-block btn-info btn-detalles' href='cliente/detalle/".$pedido->id."' ><i class='fas fa-eye'></i></a>",

                "Editar" => "<button class='btn btn-sm btn-block btn-success btn-editar' idPedido='".$pedido->id."'><i class='fas fa-edit'></i></button> ",

                "Eliminar" => "<button class='btn btn-sm btn-block btn-danger btn-eliminar' idPedido='".$pedido->id."'><i class='fas fa-trash'></i></button>",

            ];

        }
       return $pedidos;



    }
    public function dia()
    {
        $pedidosdia = Pedido::all();
        return view('Pedidos.deldia',compact('pedidosdia'));
    }
    public function cliente(Request $request)
    {
        $clientes = Cliente::where('alias','LIKE','%'.$request->term.'%')->get();
        $info = [];
        foreach ($clientes as $cliente) {
            $info[] = [
                "label"=>$cliente->alias,
                "id"=>$cliente->id,
                "idTipo"=>$cliente->tipoCliente_id

            ];
        };
        return $info;

    }
    public function producto(Request $request)
    {
        $productos = Producto::where('nombre','LIKE','%'.$request->term.'%')->get();
        $productLis = DB::table('precio_ventas')->join('pan_x_sols','pan_x_sols.id','=','precio_ventas.preciop_id')->join('productos','productos.id','=','precio_ventas.producto_id')->select('precio_ventas.producto_id','productos.nombre','pan_x_sols.cantidad')->where('precio_ventas.tipclient_id',$request->idTipo)->where('productos.nombre','LIKE','%'.$request->term.'%')->get();
        $informacion = $productLis->toArray();



        $info = [];
        foreach ($informacion as $producto) {
            $info[] = [
                "label"=>$producto->nombre,
                "value"=>$producto->nombre,
                "id"=>$producto->producto_id,
                "precio"=>$producto->cantidad

            ];
        };

        return $info;

    }

    public function pendientes()
    {
        return view('Pedidos.pendientes');
    }
    public function xcobrar()
    {
        return view('Pedidos.xcobrar');
    }

    public function detallePedido($id)
    {
        $aliascliente=DB::table('pedidos')->join('clientes','clientes.id','=','pedidos.cliente_id')->select('clientes.alias')->where('pedidos.id',$id)->get();

     $als=$aliascliente[0]->alias;

     $detalle = DB::table('detalle_pedidos')->join('productos','productos.id','=','detalle_pedidos.producto_id')->select('productos.nombre','detalle_pedidos.cantidad')->where('detalle_pedidos.pedido_id',$id)->get();
       $datos = $detalle->toArray();
       array_unshift($datos,array("alias"=> $als));

      /*  dd($datos); */
      return $datos;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {

            $userid=Auth::user()->users_id;
            $pedido = new Pedido();
            $pedido->fPedido  = $request->fecha;
            $pedido->monto = $request->totalPedido;
            $pedido->cantPan = $request->totalPanes;
            $pedido->observaciones = $request->observacion;
            $pedido->cliente_id = $request->idCliente;
            $pedido->turno_id = $request->idTurno;
            $pedido->users_id = $userid;
            $pedido->estado_id = 1;
            $pedido->recipiente_id = $request->idRecipiente;
            $pedido->save();
            foreach ($request->products as $producto) {
                $dtPedido = new DetallePedido();
                $idPedido = $pedido->id;
                $dtPedido->pedido_id = $idPedido;
                $dtPedido->producto_id = $producto['item_id'];
                $dtPedido->cantidad = $producto['item_cantidad'];
                $dtPedido->cant_x_sol = $producto['item_precio'];
                $dtPedido->save();
            }
            header('Content-Type: application/json');
            echo json_encode(array('msg'=>'Guardado con Exito','id'=> $idPedido));
            exit();

        } catch (Exception $e) {

            header('HTTP/1.1 422 Unprocessable Entity');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode(array('errorMsg' => $e->getMessage()));
            exit();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {






       return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
