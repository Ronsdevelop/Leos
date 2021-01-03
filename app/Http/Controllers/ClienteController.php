<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClientesRequest;
use App\Identificacion;
use App\TipoCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
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
        $identificacion = Identificacion::all();
        $tipoCliente = TipoCliente::all();
        return view('Clientes.index', compact('identificacion','tipoCliente'));
    }

    public function list()
    {
        $respuesta = Cliente::select('id','nombre_razon','documento_identi','representante','nCelular')->get();

        $clientes = array();
        foreach ($respuesta as $key => $value) {
                $clientes[$key] =[
                    "ID" => $value['id'],

                    "Rason" => $value['nombre_razon'],

                    "Documento" => $value['documento_identi'],

                    "Contacto" => $value['representante'],

                    "Celular" => $value['nCelular'],

                    "Comprar" => "<button class='btn btn-sm btn-block btn-primary btn-editar' idCliente='".$value['id']."'><i class='fas fa-shopping-cart'></i></button> ",

                    "Ver" => "<a class='btn btn-sm btn-block btn-info btn-detalles' href='cliente/detalle/".$value['id']."' ><i class='fas fa-eye'></i></a>",

                    "Editar" => "<button class='btn btn-sm btn-block btn-success btn-editar' idCliente='".$value['id']."'><i class='fas fa-edit'></i></button> ",

                    "Eliminar" => "<button class='btn btn-sm btn-block btn-danger btn-eliminar' idCliente='".$value['id']."'><i class='fas fa-trash'></i></button>"
                ];

        }
        return $clientes;
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

    public function detalle($id)
    {
        $cliente = Cliente::find($id);
        return view('Clientes.detalle',compact('cliente'));

    }

    public function detalleEdit($id)
    {
        $cliente = Cliente::find($id);
        return  $cliente;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesRequest $request)
    {
        $userid=Auth::user()->users_id;
        $cliente = new Cliente();
        $cliente->nombre_razon=$request->txtRazon;
        $cliente->direccion = $request->txtDireccion;
        $cliente->documento_identi = $request->txtDoc;
        $cliente->alias = $request->txtAlias;
        $cliente->referencia = $request->txtReferencia;
        $cliente->representante=$request->txtContacto;
        $cliente->nCelular=$request->txtCelular;
        $cliente->email=$request->txtCorreo;
        $cliente->cumpleanos=$request->txtCumple;
        $cliente->tipoCliente_id=$request->txtTipoCliente;
        $cliente->identificacion_id=$request->txtTipoIdentificacion;
        $cliente->users_id=$userid;
        $cliente->save();
        return true;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
