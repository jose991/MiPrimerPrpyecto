<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LaboratorioFormRequest;
use App\Laboratorio;
use App\Categoria;

class LaboratorioController extends Controller
{
    //IMPORTANTE PARA QUE EL USUARIO TENGA QUE INICIAR SESION Y ASI VER LAS RUTAS CORRESPONDIENTES, SI QUIERE IR A UNA RUTA, PO EJEMPLO, usuarios, roles, NO PODRa!!!SE LE REDIGIRA A LA VENTANA DE LOGIN, ES DECIR QUE TENDRA QUE INICIAR SESION OBLIGATORIAMENTE
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        /*$laboratorios = Laboratorio::all();
        return view('laboratorios.index', ['laboratorios' => $laboratorios]); //'laboratorios' ESTA ES LA LLAVE QUE SE USA PARA CONECTAR CON LA VISTA Y CARGAR LOS DATOS*/

        //PARA MOSTRAR LOS LABORATORIOS REGISTRADOS, Y LA CATEGORIA QUE SE ENCUNTRA EN OTRA TABLA Y MODELO
        $laboratorios = Laboratorio::all()->sortByDesc("id");;
        $laboratorios->each(function($laboratorios){ //each HACE UN RECORRIDO DE TODOS LOS DATOS, EN ESTE CASO EN SOLICITUDES Y LOS DEVUELVE
            $laboratorios->category;
        });
        return view('laboratorios.index', ['laboratorios' => $laboratorios])
        ->with('laboratorios', $laboratorios);//OTRA FORMA DE REOTRNAR LOS DATOS A LA VISTA
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('laboratorios.create', ['categorias' => $categorias]);
    }

    public function store(laboratorioFormRequest $request)
    {
        /**$this->validate($request,[ 'nombre'=>'required', 'carrera'=>'required', 'actividad'=>'required', 'descripcion'=>'required']);
        Laboratorio::create($request->all());
        return redirect()->route('laboratorios.index')->with('success','Registro creado satisfactoriamente');**/
        $nombre = $request->input("nombre");
        $actividad = $request->input("actividad");
        $descripcion = $request->input("descripcion");
        $category_id = $request->input("category_id");

        $laboratorio = new Laboratorio();
        $laboratorio->nombre = $nombre;
        $laboratorio->actividad = $actividad;
        $laboratorio->descripcion = $descripcion;
        $laboratorio->category_id = $category_id;

        if ($request->hasFile('imagen')){
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $laboratorio->imagen = $file->getClientOriginalName();//CON ESTO SE INTROUDCE EL NOMBRE DLE ARCHIVO ORIGINAL EN LA BASE DE DATOS
        }

        $laboratorio->save();

        return redirect()->route('laboratorios.index');
    }

    public function show($id)
    {
        $laboratorio=Laboratorio::find($id);
        return view('laboratorios.show',compact('laboratorio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$categorias=Categoria::all()->lists('name', 'id');

        //$laboratorio=Laboratorio::find($id);
        //return view('laboratorios.edit',compact('laboratorio'));
        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->category;
        //dd($laboratorio->category->id); //PRUEBA DE QUE DEVUELKVE LA CATEGORIA A LA CUAL PERTEENE EL LABORATORIO
        $categorias = Categoria::all();

        return view('laboratorios.edit')
            //->with('categorias', $categorias)
            ->with('laboratorio', $laboratorio)
            ->with('categorias', $categorias);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'nombre'=>'required', 'actividad'=>'required', 'descripcion'=>'required']);
 
        Laboratorio::find($id)->update($request->all());
        return redirect()->route('laboratorios.index');
    }
    
    public function destroy($id)
    {
        //Laboratorio::find($id)->delete();
        //return redirect()->route('laboratorios.index');//->with('success','Registro eliminado satisfactoriamente');
        //$laboratorio = Laboratorio::findOrFail($id);

        //$laboratorio->delete();

        //return redirect('/laboratorios');
        //Laboratorio::destroy($id);
        //return redirect()->route('laboratorios.index');
        //Laboratorio::find($id)->delete;
        Laboratorio::find($id)->delete();
        return redirect()->route('laboratorios.index');

    }
}
