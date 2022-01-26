<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
	protected $table = "laboratorios";

    protected $fillable = ['nombre', 'actividad', 'descripcion', 'category_id'];

    //relacion uno a muchos con Categoria
    //ACA SE ESCRIBE LA FUNCION EN SINGULAR PORQUE Z LABORATORIO SOLO PUEDE TENER UN CATEGORIA
    public function category() //CAMBIE EL NOMBRE categoria POR category PARA QUE SE PUEDA MOSTAR EL LISTADO, Y FUNCIONE BIEN, ESTO ME LLEVO A ENTENDER QUE NO SE PUEDE TENR EL MISMO NOMBRE DE MODLEO Y FUNCION DEL MODELO
    {
    	return $this->belongsTo('App\Categoria');
    } 

    //UN LABORATORIO PUEDE TENER MUCHAS SOLIITUDES
    public function solicitudes()
    {
    	return $this->hasMany('App\Solicitud');
    }
}
