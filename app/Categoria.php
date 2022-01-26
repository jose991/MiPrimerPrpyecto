<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categorias";

    protected $fillable = ['nombre'];
    
    //relacion uno a muchos con Laboraotiro
   	//UNA CATEGORIA PUEDE TNER MUCHOS LA<BORATORIOS
    public function laboratorios()
    {
    	return $this->hasMany('App\Laboratorio');
    }

    //RELACION UNO A MUCHOS CON SOLICITUD
    //ACA SE ESESCRIBE EN PLURAL POR LA LOGIA, ES DECIR, PORQUE UNA CATEGORIA PUEDE TENER MUCHAS SOLITUDES
    public function solicitudes()
    {
        return $this->hasMany('App\Solictud');
    }

}
