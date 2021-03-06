<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Cliente;
use App\Identificacion;
use App\Producto;
use App\TipoCliente;
use Illuminate\Http\Request;

class PosController extends Controller
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
        $categorias = Categoria::all();
        $productos = Producto::all();
        return view('Pos.index', compact('categorias','productos'));
    }
    public function addclie()
    {
        $identificacion = Identificacion::all();
        $tipoCliente = TipoCliente::all();
        return view('Pos.addcliente', compact('identificacion','tipoCliente'));
    }
    public function editclie($id)
    {
        $cliente = Cliente::find($id);
        $identificacion = Identificacion::all();
        $tipoCliente = TipoCliente::all();
        return view('Pos.editcliente', compact('identificacion','tipoCliente','cliente'));
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

    public function producto(Request $request)
    {
        $products = [];
        if ($request->op != 0) {
            $products = Producto::where('categoria_id','=',$request->op)->where('nombre','LIKE','%'.$request->term.'%')->get();
        }else{
            $products = Producto::where('nombre','LIKE','%'.$request->term.'%')->get();
        }
        header('Content-Type: application/json');
	    echo json_encode(array('products' => $products, 'pagination' => "", 'page' => 0));
	    exit();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->op != 0) {
            $products = Producto::where('categoria_id','=',$request->op)->get();


        }else{
            $products = Producto::all();
        }

        header('Content-Type: application/json');
	    echo json_encode(array('products' => $products, 'pagination' => "", 'page' => 0));
	    exit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
