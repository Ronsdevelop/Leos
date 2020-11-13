<?php

namespace App\Http\Controllers;

use App\Proveedores;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProveedoresRequest;

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
    public function create()
    {


      /*  return Proveedores::create([
            'rason'=>$request('txtRazon'),
            'ruc'=>$request('txtIndetificacion'),
            'direccion'=>$request('txtDireccion'),
            'contacto'=>$request('txtContacto'),
            'email'=>$request('txtCorreo'),
            'nCelula'=>$request('txtCelular'),
            'nFono'=>$request('txtFijo'),
            'referencia'=>$request('txtReferencia'),
        ]);*/
        return view('Proveedores.index');

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
    public function store(StoreProveedoresRequest $request)
    {
        $proveedor = new Proveedores();
        $proveedor->rason=$request->txtRazon;
        $proveedor->ruc = $request->txtIndetificacion;
        $proveedor->direccion = $request->txtDireccion;
        $proveedor->contacto=$request->txtContacto;
        $proveedor->email=$request->txtCorreo;
        $proveedor->nCelula=$request->txtCelular;
        $proveedor->nFono=$request->txtFijo;
        $proveedor->referencia = $request->txtReferencia;
        $proveedor->save();
        return true;
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
        return $proveedores;
      /*   $proveedores->update([
            'rason'=>request('txtRazon'),
            'ruc'=>request('txtIndetificacion'),
            'direccion'=>request('txtDireccion'),
            'contacto'=>request('txtContacto'),
            'email'=>request('txtCorreo'),
            'nCelula'=>request('txtCelular'),
            'nFono'=>request('txtFijo'),
            'referencia'=>request('txtReferencia')
            ]
        ); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $DatosValidados= $request->validate([
            'txtRazon'=>'required',
            'txtIndetificacion'=>'required|numeric',
            'txtDireccion'=>'required',
            'txtContacto'=>'required',
            'txtCorreo'=>'required|email' ,
            'txtCelular'=>'required|numeric',
            'txtFijo'=>'required',
            'txtReferencia'=>'required',
        ]);

        $proveedores = Proveedores::find(request('txtId'));
        $proveedores->update([
            'rason'=>request('txtRazon'),
            'ruc'=>request('txtIndetificacion'),
            'direccion'=>request('txtDireccion'),
            'contacto'=>request('txtContacto'),
            'email'=>request('txtCorreo'),
            'nCelula'=>request('txtCelular'),
            'nFono'=>request('txtFijo'),
            'referencia'=>request('txtReferencia')
            ]);
        return  $proveedores;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->codigo;
        $proveedor = Proveedores::find($id);
        $proveedor->delete();

        return  'ok';
    }
}
