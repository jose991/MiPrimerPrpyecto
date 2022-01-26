<?php

namespace App\Http\Controllers;
use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //IMPORTANTE PARA QUE EL USUARIO TENGA QUE INICIAR SESION Y ASI VER LAS RUTAS CORRESPONDIENTES, SI QUIERE IR A UNA RUTA, PO EJEMPLO, usuarios, roles, NO PODRa!!!SE LE REDIGIRA A LA VENTANA DE LOGIN, ES DECIR QUE TENDRA QUE INICIAR SESION OBLIGATORIAMENTE
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$categorias = Categoria::All();
    	return view('categorias.index', ['categorias' => $categorias]);
    }

    public function create()
    {
    	return view('categorias.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, ['nombre' => 'required']);
    	Categoria::create($request->all());
    	return redirect('categorias');
    }
}
