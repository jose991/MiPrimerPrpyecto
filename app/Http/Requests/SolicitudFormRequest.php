<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudFormRequest extends FormRequest
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
            'nombreSolicitante' => 'required|max:255',
            'carreraSolicita' => 'required|max:255',
            'nombreEvento' => 'required|max:255',
            'nombrePractica' => 'required|max:255',
            'fecha' => 'required|max:255',
            'horaInicio' => 'required|max:255',
            'horaFin' => 'required|max:255',
            //'user_id' => 'required',//ESTE NO!! PORQUE TRAE AL USUARIO LOGEADO Y NO VA DEJAR REGISTRARA, PORQUE NO EXISTE UN CAMPO PARA ELEGIR O ESCRIBIR UN DATO
            'category_id' => 'required', 
            'laboratory_id' => 'required'  
        ];
    }
}
