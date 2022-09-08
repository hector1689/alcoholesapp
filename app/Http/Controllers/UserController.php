<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsuariosVerificadores;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct(){
         date_default_timezone_set("America/Monterrey");
         setlocale(LC_TIME, 'es_ES.UTF-8');
         Carbon::setLocale('es');
     }


    public function index(Request $request)
    {
      //dd(User::all());
      if ($request->ajax()) {
        $usuarios = User::orderBy('created_at','ASC')->where('activo',1)
        ->select('id', 'name', 'username', 'email', 'created_at', 'activo')
          ->get();
          return datatables()->of($usuarios)
          ->addColumn('roles', function($data){
             if(!empty($data->getRoleNames())){
               foreach($data->getRoleNames() as $v){
                 return '<span class="label label-inline label-light-success font-weight-bold">'.$v.'</span>';
                 }
               }
          })
  /*        ->addColumn('estatus', function($data){
              if ($data->activo == 1) {
                return '<span class="label label-inline label-light-success font-weight-bold">Aprobado</span>';
              }else{
                return '<span class="label label-lg font-weight-bold label-light-primary label-inline">Pendiente</span>';
              }
          })
*/
          // ->addColumn('origen', function($data){
          //     if ($data->origen == 1) {
          //       return 'App Móvil';
          //     }else{
          //       return 'Web';
          //     }
          // })

          ->addColumn('action', function($data){

              if(Auth::user()->can('editar usuario')){

                $permiso = '<a href="/dashboard/users/'.$data->id.'/edit"><i class="flaticon2-pen text-primary"></i></a> <a onclick = "borrar('.$data->id.')"><i class="flaticon2-trash  text-danger"></i></a>';

              }else{
                $permiso ='';
              }

              return $permiso;
          })

          ->addColumn('fecha', function($data){
              $fecha = Carbon::parse($data->created_at)->formatLocalized('%d %B %Y');
            return $fecha;
          })

          ->rawColumns(['action', 'roles', 'estatus', 'origen', 'fecha'])
          ->make(true);
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::whereIn('id',[1,2,3])->get();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->roles);


        // $usuario = User::find($user->id);
        // $usuario->origen = 0;
        // $usuario->save();

        return redirect()->route('users.index')
                        ->with('success','Usuario creado satisfactoriamente');
    }

    public function nuevosUsuarios(Request $request){

        $verificadores = UsuariosVerificadores::all();
        $i=1;
        foreach ($verificadores as $key => $value) {
          // code...

          $rol = 'verificador';
          $usuario_name = 'verificador'.$i;
          $email = $usuario_name.'@gmail.com';
          //dd($usuario_name);
          $usuario = new User();
          $usuario->name = $value['NOMBRE_EJECUTOR'];
          $usuario->username = $usuario_name;
          $usuario->email = $email;
          $usuario->password =  Hash::make($input['password']);
          $usuario->id_ejecutor = $value['ID_EJECUTOR'];
          $usuario->assignRole($rol);
          $usuario->save();

          $i++;
        }



    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $role = $user->roles->pluck('name')->all();
        return view('users.show',compact('user','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::whereIn('id',[1,2,3])->get();
        $userRole = $user->roles->pluck('name')->all();
        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->roles);

        return redirect()->route('users.index')
                        ->with('success','Usuario editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
     {
       try {
         $usuarios = User::find($request->id);
         $usuarios->activo = 0;
         $usuarios->save();

         return response()->json(['success'=>'Registro Eliminado exitosamente']);
       } catch (\Exception $e) {
         dd($e->getMessage());
       }
     }

    // public function destroy($id)
    // {
    //     User::find($id)->delete();
    //     return redirect()->route('users.index')
    //                     ->with('success','Usario eliminado satisfactoriamente');
    // }
}
