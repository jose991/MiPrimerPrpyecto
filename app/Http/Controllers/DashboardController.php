<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index()
	{
		return view('dashboard');
	}
	//ESTE CONSTRUCTOR SEIVE PARA QUE CUANDO UN USUARIO QUIERA INGRESAR A LA PAGINA, ENTONCES SOLO SE LO DEJARA A LOS USUARIOS AUTENTIFICADOS
	public function __construct()
	{
		$this->middleware('auth');
	}
}
