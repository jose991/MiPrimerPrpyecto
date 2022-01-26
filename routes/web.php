<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**Route::get('/', function () {
    return view('welcome');
});**/

/**Route::get('/', function () {
    return view('auth.login');
});**///SE VOLVIO A MODIFICAR ESTO, PARA QUE CUANDO ENTRE A HOME, NO ME MUESTRE EL FORMLUARIO EN CASO DE ESTAR AUTENTIFACSDO, ES DECIR, YA INICIADA LA SESION
Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');//PARA CERRAR LA SESIÓN


Route::get('admin', function () {
    return view('admin.inicio');
});

Route::resource('usuarios', 'UsuarioController');

Route::resource('roles', 'RoleController');

Route::resource('laboratorios', 'LaboratorioController');

Route::resource('solicitudes', 'SolicitudController');

Route::resource('categorias', 'CategoriaController');

//RUTAS PARA EL PDF
Route::get('/pdfusuarios', 'PDFController@PDFUsuarios')->name('descargarPDFUsuarios');
Route::get('/pdfsolicitudes', 'PDFController@PDFSolicitudes')->name('descargarPDFSolicitudes');
Route::get('/pdflaboratorios', 'PDFController@PDFLaboratorios')->name('descargarPDFLaboratorios');