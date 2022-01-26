<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //SE AGREGA PAR AEL ROL DE USUARIOS
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function asignarRol($role)
    {
        $this->roles()->sync($role, false);
    }
    //PARA VERRIFICAR QUE ROL TIENE UN USUARIO
    public function tieneRol()
    {
        return $this->roles->flatten()->pluck('name')->unique();
    }

    //RELACION UNO A MUCHOS CON SOLICITUD
    //ACA SE ESESCRIBE EN PLURAL POR LA LOGIA, ES DECIR, PORQUE UN USUARIO PUEDE TENER MUCHAS SOLITUDES
    public function solicitudes()
    {
        return $this->hasMany('App\Solictud');
    }
}
