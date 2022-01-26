<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserEditFormRequest;
use App\Http\Requests\UserFormRequest;
use App\User;
use App\Role;
class UsuarioController extends Controller
{    
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('search'));

            $usuarios = User::where('name', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                //->get();//EN VEZ DE USAR ESTO, SE USA PAGINATE, PARA PAGINAR LAS PAGINAS
                ->paginate(5);//UNA OPCION DE PAGINACION
                //->simplePaginate(5);//OTRA OPCION DE PAGINACION

                //dd($usuarios);

            return view('usuarios.index', ['usuarios' => $usuarios, 'search' => $query]);
        }


        //$usuarios=User::all();
        //return view('Usuarios.index',['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();//SE AGREGA PARA ELEGIR UN ROL DE USUARIO
        return view('usuarios.create', ['roles' => $roles]); //AQUI TAMBIEN SE GREGO CODIGO DESPUES DE LA COMA ,
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $usuario = new User();

        $usuario->name = request('name');
        $usuario->email = request('email');
        $usuario->password = bcrypt(request('password')); //AGREGUE bcrypt  PARA QUE SE PUEDA ENCRIPTAR LA CONTRASEÑA, ES DECIR, QUE EN LA BASE DE DATOS LA CONTRASEÑA APARECE TAL CUAL COMO SE ESCRIBIO, NO APARECE ENCRIPTADA!!, ADEMAS AL QUERER INICIAR SESION NO SE PODRA, DICE QUE LAS CREDENCIALES NO EXISTEN, ES DECIR, EL GMAIL
        //PARA LA IMAGEN
        if ($request->hasFile('imagen')){
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();//CON ESTO SE INTROUDCE EL NOMBRE DLE ARCHIVO ORIGINAL EN LA BASE DE DATOS
        }

        $usuario->save();

        $usuario->asignarRol($request->get('rol'));//LO AGREGUE PARA QUE SE PUEDA GUARDAR EL ROLE ELEGIDO DESDE EL REGISTRO DE USARIO, LA LLAVAE DEL FORMULARIO ES 'rol' //ACA SE ASIGAN EL ROL AL USUARIO

        return redirect('');//retornar una redireccion al guardar el usuario, EN DONDE SE ENCUENTRA LA LISTA DE USUARIOS
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('usuarios.show', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view('usuarios.edit', ['user' => User::findOrFail($id)]);//ESTA LINEA SE CAMBIO, PARA QUE MUESTRE EL ROL TAMBIEN EL EL FORMULARIO DE EDITAR USUARIO, PARA QUE DE ESTA FORMA SE DEVUELVA LOS UAUSARIOS Y ROLES CORRSPONDIENTES
        $usuario = User::findOrFail($id);
        $roles = Role::all();
        return view('usuarios.edit', ['user' => $usuario, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditFormRequest $request, $id) //AGREGUE UserForm a Request para validar los datos de usuario del formulario, arriba se importa y lo tengo comentado//YA ME FUNCIONA EL UserFormRequest, pero lo quite por otra razon
    {
        /**$this->validate($request,[ 'name'=>'required', 'email'=>'required']);
 
        User::find($id)->update($request->all());
        return redirect()->route('usuarios.index')->with('success','Registro actualizado satisfactoriamente');**///CODIGO QUE UTLICE PARA VALIDAR LOS DATOS DEL FORMULARIO A GUARDAR

        /**$usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');

        $usuario->update();

        return redirect('/usuarios');**/

        //CODIGO PARA VALIDAR DATOS E IMAGEN (podria decirse codigo final jajaja xd)
        $this->validate(request(),[ 'email'=>['required', 'email', 'max:255', 'unique:users,email,' . $id]]);
        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');

        if ($request->hasFile('imagen')){
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();//CON ESTO SE INTROUDCE EL NOMBRE DLE ARCHIVO ORIGINAL EN LA BASE DE DATOS
        }
        //PARA VALIDAR EL CAMBIO DE CONTRASEÑA, SOLO EN CASO DE QUE SE QUIERA CAMBIAR, DE LO CONTRARIO NO HACE NADA, ES OPCIONAL PARA EL USUARIO
        $pass = $request->get('password');
        if ($pass != null) {
            $usuario->password = bcrypt($request->get('password'));
        }else{
            unset($user->password);
        }

        //SE MODIFICO ESTA PARTE PARA QUE SE PUEDA AGREGAR UN ROL AL USUARIO, DE FORMA QUE, SI UN USUARIO TIENE UN ROL SE PUEDA ACTUALIZAR, Y EN DADO CASO DE NO TENER,E TMONCES SE LE ASIGAN, SE LE PODRA AGREGAR EN EL FORMULARIO, YA QUE SI NO SE AGREGA EL CODIGO NO SE PODRA GUARDAR Y MOSTARAR ERRROR DE role_id
        //PARA QUE SE PUEDA ACTUALIZAR EL ROL Y SE GUARDE LOS CAMBIOS EN LA BASE DE DATOS
        /**$role = $usuario->roles;
        if (count($role) > 0) {
            $role_id = $role[0]->id;
        }
        User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);
        //updateExistingPivot ---CON AYUDA DE ESTE METODO SE ESTA ACTULIZANDO UN NUEVO RO, EN CASO DE SER ELEGIDO POR EL USUARIO**/
        $role = $usuario->roles;
        if (count($role) > 0) {
            $role_id = $role[0]->id;

            User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);
        }else{
            $usuario->asignarRol($request->get('rol'));
        }

        $usuario->update();

        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect('/usuarios');
    }
}
