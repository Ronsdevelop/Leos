<?php

namespace App\Http\Controllers;

use App\cargos;
use App\Http\Requests\UsuariosRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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
    {   $usuarios = User::paginate(6);
        $cargos = cargos::all();
        return view('Usuarios.index',compact('usuarios','cargos'));
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
        $idLogueado = Auth::user()->users_id;
        $imgStore = $request->nuevaFoto->store('public/img/avatar');
        $urlimg = Storage::url( $imgStore);
        $usuario = new User();
        $usuario->name = $request->txtNombres;
        /*$usuario-> = $request->txtApaterno;
        $usuario = $request->txtAmaterno;*/
        $usuario->direccion = $request->txtDireccion;
        $usuario->dni = $request->txtDni;
        $usuario->nCelular = $request->txtCelular;
        $usuario->fIngreso = $request->txtFecha;
        $usuario->user = $request->txtUsuario;
        $usuario->password = Hash::make($request->txtPass);
        $usuario->email = $request->txtCorreo;
        $usuario->cargos_id = $request->txtTipo;
        $usuario->avatar = $urlimg;
        $usuario->users_id = $idLogueado;
        $usuario->save();
        return true;
    }

    public function detalle($id)
    {
        $user = User::find($id);
        return view('Usuarios.detalle',compact('user'));

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
