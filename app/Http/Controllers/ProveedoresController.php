<?php

namespace App\Http\Controllers;

use App\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
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
        return view('Proveedores.index');
    }

    public function list(){
        $respuesta = Proveedores::select('id','rason','direccion','contacto','nCelula')->get();
        $proveedores = array();
        foreach ($respuesta as $key => $value) {
                $proveedores[$key] =[
                    "ID" => $value['id'],

                    "Rason" => $value['rason'],

                    "Direccion" => $value['direccion'],

                    "Contacto" => $value['contacto'],

                    "Celular" => $value['nCelula'],

                    "Comprar" => "<button class='btn btn-sm btn-block btn-primary btn-editarPro' idProveedor='".$value['id']."'><i class='fas fa-shopping-cart'></i></button> ",

                    "Ver" => "<a class='btn btn-sm btn-block btn-info btn-detalles' href='proveedor/detalle/".$value['id']."' idProveedor='".$value['proveedor_id']."'><i class='fas fa-eye'></i></a>",

                    "Editar" => "<button class='btn btn-sm btn-block btn-success btn-editarPro' idProveedor='".$value['id']."'><i class='fas fa-edit'></i></button> ",

                    "Eliminar" => "<button class='btn btn-sm btn-block btn-danger btn-eliminarPro' idProveedor='".$value['id']."'><i class='fas fa-trash'></i></button>"
                ];

        }
        return $proveedores;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       return Proveedores::create([
            'rason'=>request('txtRazon'),
            'ruc'=>request('txtIndetificacion'),
            'direccion'=>request('txtDireccion'),
            'contacto'=>request('txtContacto'),
            'email'=>request('txtCorreo'),
            'nCelula'=>request('txtCelular'),
            'nFono'=>request('txtFijo'),
            'referencia'=>request('txtReferencia'),
        ]);

    }

    public function detalle($id)
    {
        $proveedor = Proveedores::find($id);
        return view('Proveedores.detalle',compact('proveedor'));

    }

    public function detalleEdit($id)
    {
        $proveedor = Proveedores::find($id);
        return  $proveedor;

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
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedores $proveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedores $proveedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedores $proveedores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedores $proveedores)
    {
        //
    }
}
