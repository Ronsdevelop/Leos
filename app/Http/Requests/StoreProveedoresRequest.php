<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedoresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtRazon'=>'required',
            'txtIndetificacion'=>'required|numeric',
            'txtDireccion'=>'required',
            'txtContacto'=>'required',
            'txtCorreo'=>'required|email' ,
            'txtCelular'=>'required|numeric',
            'txtFijo'=>'required',
            'txtReferencia'=>'required',
        ];
    }

    public function attributes()
    {
        return[
            'txtRazon'=> 'Razon Social',
            'txtIndetificacion'=>'Ruc Proveedor',
            'txtDireccion'=>'Direccion Proveedor',
            'txtContacto'=>'Contacto',
            'txtCorreo'=>'Correo Electronico' ,
            'txtCelular'=>'Celular',
            'txtFijo'=>'Telefono Fijo',
            'txtReferencia'=>'Referencia del Proveedor',
        ];


    }
    public function messages()
    {
        return[
            'txtReferencia.required'=>'Debe Ingresar una referencia del Local del Proveedor',
        ];
    }
}
