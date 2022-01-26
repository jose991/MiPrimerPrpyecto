<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = "solicitudes"; //CON ESTA LIENA SE SOLUCIONA EL SIG. 
    //ERROR Base table or view not found: 1146 Table 'proyectofinish.solicituds' doesn't exist (SQL: select * from `solicituds`)

    protected $fillable = ['nombreSolicitante', 'carreraSolicita', 'nombreEvento', 'nombrePractica', 'fecha', 'horaInicio', 'horaFin', 'user_id', 'category_id', 'laboratory_id']; 

    //relacion uno a muchos con User
    //ACA SE ESCRIBE LA FUNCION EN SINGULAR PORQUE UNA SOLICITUD SOLO PUEDE TENER UN Usuario
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    //relacion uno a muchos con Categoria
    //ACA SE ESCRIBE LA FUNCION EN SINGULAR PORQUE UNA SOLICTUD SOLO PUEDE TENER UN CATEGORIA
    public function category()
    {
    	return $this->belongsTo('App\Categoria');
    }

    //UNA SOLICITUD PUEDE TENER UN LABORATORIO
    public function laboratory()
    {
        return $this->belongsTo('App\Laboratorio');
    }
}
