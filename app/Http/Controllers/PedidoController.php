<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\DetallePedido;
use App\Pedido;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function todos()
    {
        $pedidos = Pedido::all();
        return view('Pedidos.todos',compact('pedidos'));
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
