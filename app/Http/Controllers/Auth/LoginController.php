<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     //* @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     //* @return void
     */
    /**public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }**/
    public function login()
    {
        $credentials = $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials))
        {
            //return 'Sesion iniciada correctamente';
            return redirect()->route('dashboard');
        }
        return back()
            ->withErrors(['email' => trans('auth.failed')])
        //trans('auth.failed'   ESTA LINEA SSE AGREGO, PORQUE EN EL ARCHIVO resouces/lang/en/auth, esite, y se usua el mensaje en ingles que aparece en caso de que no exista el usuario en la base de datos
            ->withInput(request(['email']));//SIRVE PARA QUE EL EMAIL QUE NO EXISTA SE QUEDE EN EL CAMPO, SIN NECESISDAD DE VOLVER A ESCRIBIRLO, TAMBIEN HAY CODIGO EN EL FORMULARIO CREADO MANUELAMENTE(login.blade.php)

    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    //ESTE CONSTRUCTOR HACE QUE SE ACCEDA AL LOGIN SOLO SI SON INVITADOS NO AUTENTIFICADOS
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
