<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];//SIRVE COMO UNA LISTA NEGRA, PARA QUE TODOS LO ATRIBUTOS SEAN ACEPTADOS
}
