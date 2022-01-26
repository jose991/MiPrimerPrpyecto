<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;//SE AGREGA POR SI NO FUNCIONA LA REDIRECCIONA OTRA PAGINA AL GUARDAR LOS DATOS ENE L METODO STORE, POR LA FUNCION redirect
use App\Http\Requests\SolicitudFormRequest;
use App\Solicitud;
use App\Categoria;
use App\User;
use App\Laboratorio;

class SolicitudController extends Controller
{
    //IMPORTANTE PARA QUE EL USUARIO TENGA QUE INICIAR SESION Y ASI VER LAS RUTAS CORRESPONDIENTES, SI QUIERE IR A UNA RUTA, PO EJEMPLO, usuarios, roles, NO PODRa!!!SE LE REDIGIRA A LA VENTANA DE LOGIN, ES DECIR QUE TENDRA QUE INICIAR SESION OBLIGATORIAMENTE
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    	$solicitudes = Solicitud::all()->sortByDesc("id");
    	//LLAMAR A LAS RELACIONES EXTINTES EN EL MODELO DE SOLICITUD, PARA QWUE SE PUEDAN MOSTRAR EN EL LISTADO
    	$solicitudes->each(function($solicitudes){ //each HACE UN RECORRIDO DE TODOS LOS DATOS, EN ESTE CASO EN SOLICITUDES Y LOS DEVUELVE
    		$solicitudes->category;
    		//$solicitudes->categoria;//NO PUEDE SER IGUAL EL NOMBRE DEL MODELO Y DE LA FUNCION DLE MODLEO, PORQUE SI NO MUESTRA ERROR EN EL MOMENTO DE QUERRE LISTARLO
    		$solicitudes->user;
            $solicitudes->laboratory; //SE TIENE QUE LLAAMAR A LAS CLASES CREADAS EN EL MODELO, CLARO, SIEMPRE Y CUNAOD EXISTAN Y SEAN REQUERIDAS
    	});

    	//sdd($solicitudes);//PRUEBA EN FORMA DE ARRAY PARA VER SI FUNCIONA

        return view('solicitudes.index', ['solicitudes' => $solicitudes])
        ->with('solicitudes', $solicitudes);//OTRA FORMA DE REOTRNAR LOS DATOS A LA VISTA
    }

    public function create()
    {
    	$categorias = Categoria::all();
    	$usuarios = User::all();
        $laboratorios = Laboratorio::all();
        return view('solicitudes.create', ['laboratorios' => $laboratorios], ['categorias' => $categorias], ['usuarios' => $usuarios]);
    }

    public function store(SolicitudFormRequest $request)
    {
        /**$this->validate($request,[ 'nombre'=>'required', 'carrera'=>'required', 'actividad'=>'required', 'descripcion'=>'required']);
        Laboratorio::create($request->all());
        return redirect()->route('laboratorios.index')->with('success','Registro creado satisfactoriamente');**/
        $nombreSolicitante = $request->input("nombreSolicitante");
        $carreraSolicita = $request->input("carreraSolicita");
        $nombreEvento = $request->input("nombreEvento");
        $nombrePractica = $request->input("nombrePractica");
        $fecha = $request->input("fecha");
        $horaInicio = $request->input("horaInicio");
        $horaFin = $request->input("horaFin");
        $user_id = $request->input("user_id");
        $category_id = $request->input("category_id");
        $laboratory_id = $request->input("laboratory_id");
       

        $solicitud = new Solicitud();
        $solicitud->nombreSolicitante = $nombreSolicitante;
        $solicitud->carreraSolicita = $carreraSolicita;
        $solicitud->nombreEvento = $nombreEvento;
        $solicitud->nombrePractica = $nombrePractica;
        $solicitud->fecha = $fecha;
        $solicitud->horaInicio = $horaInicio;
        $solicitud->horaFin = $horaFin;
        $solicitud->user_id = \Auth::user()->id;
        $solicitud->category_id = $category_id;
        $solicitud->laboratory_id = $laboratory_id;

        $solicitud->save();

        //dd($solicitud);//HACIENDO PRUEBAS DE LO QUE HACE, DE SI AL OPIRMIR GUARDAR MUESTRA EL ARRAY CON TODOS LOS DATOS CORRECTAMENTE, LO USE PARA PEUEBAS Y SI FUNCIONO, PARA VER SI DEVUELVE AL USUARIO LOGEADO

        //return view('solicitudes.index'); //ESTA LIENA GENRABA UN ERROR AL GUARDAR, DICIENDO QUE NO EXISTE LA VARIABLE solicitudes, PO LA FORMA EN LA QUE SE GUARDAN LOS DATOS, POR ELLO, SE REEMPLAZA Y SE CORRIGE CON LA LINEA DE CODGIP DE ABAJO, QUE ESTA REDIRIGIENDO A L APAGINA DE INDEX
        return redirect()->route('solicitudes.index');
    }

    public function show($id)
    {
        $solicitud=Solicitud::find($id);
        return view('solicitudes.show',compact('solicitud'));
    }

    public function edit($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->category;
        $solicitud->laboratory;
       
        $categorias = Categoria::all();
        $laboratorios = Laboratorio::all();

        return view('solicitudes.edit')
            ->with('solicitud', $solicitud)
            ->with('categorias', $categorias)
            ->with('laboratorios',$laboratorios);
    }
    //ACA ME QUEDE, REVISAR EL UPDATE DE LABORAOTIRO TAMBIEN XDXDXD
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'nombre'=>'required', 'actividad'=>'required', 'descripcion'=>'required']);
 
        Laboratorio::find($id)->update($request->all());
        return redirect()->route('laboratorios.index');
    }
    
    public function destroy($id)
    {
        Solicitud::find($id)->delete();
        return redirect()->route('solicitudes.index');
    }
}
