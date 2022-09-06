<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Validator;

class ApiController extends Controller
{

  private $MSJ_PASSWORD =  'Usuario o contraseña incorrecta';
  private $MSJ_CORREO =  'El correo ya fue registrado';

  public function checkUser(Request $request){
    return $request->user();
  }

  public function update(Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'username' => 'required',
    ], [
      'name.required' => 'El nombre es obligatorio',
      'email.required' => 'El correo es obligatorio',
      'username.required' => 'El nombre de usuario es obligatorio',
    ]);
    if($validator->fails()){
      return $this->sendError('Error de validación.', $validator->errors() );
    }

    $user = User::find($request->id);
    if(!$user){
      //esto no deberia pasar
      return $this->sendError( $this->MSJ_PASSWORD,
        ['error'=> $this->MSJ_PASSWORD], 401);
    }
    $propietarioEmail = User::where('activo', 1)->where('email', $request->email)->first();
    if($propietarioEmail && $propietarioEmail->id != $user->id){
      return $this->sendError($this->MSJ_CORREO, ['error' => $this->MSJ_CORREO] );
    }
    $input = $request->all();
    if(isset($input['password'])){
      $input['password'] = bcrypt($input['password']);
    }
    $user->fill($input);
    $user->save();
    $success['name'] =  $user->name;
    $success['username'] = $user->username;
    $success['email'] = $user->email;
    $success['id'] = $user->id;

    return $this->sendResponse($success, 'User register successfully.', 200);
  }

  public function register(Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'username' => 'required',
      'password' => 'required',
    ], [
      'name.required' => 'El nombre es obligatorio',
      'email.required' => 'El correo es obligatorio',
      'username.required' => 'El nombre de usuario es obligatorio',
      'password.required' => 'La contraseña es obligatoria',
    ]);

    if($validator->fails()){
      //return response()->json()
      return $this->sendError('Error de validación.', $validator->errors() );
    }
    if( User::where('activo', 1)->where('email', $request->email)->exists()){
      return $this->sendError($this->MSJ_CORREO, ['error' => $this->MSJ_CORREO] );
    }
    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    $user = User::create($input);
    $success['token'] =  $user->createToken('MyApp')->plainTextToken;
    $success['name'] =  $user->name;
    $success['username'] = $user->username;
    $success['email'] = $user->email;
    $success['id'] = $user->id;

    return $this->sendResponse($success, 'User register successfully.', 201);
  }

  public function login(Request $request){
    if(Auth::attempt([
      'username' => $request->username,
      'password' => $request->password,
      'activo' => 1
    ])){
      $user = Auth::user();
      $success['roles'] = $user->roles->pluck('name')->toArray();
      $success['token'] =  $user->createToken('MyApp')->plainTextToken;
      $success['name'] =  $user->name;
      $success['username'] = $user->username;
      $success['email'] = $user->email;
      $success['id'] = $user->id;

      return $this->sendResponse($success, 'Login correcto.');
    }
    else{
      return $this->sendError($this->MSJ_PASSWORD, ['error'=>$this->MSJ_PASSWORD], 401);
    }
  }

  public function logout(Request $request){
    $user = User::find($request->user()->id);
    $user->tokens()->delete();
    return $this->sendResponse([], 'Sesión cerrada.');
  }

  public function sendError($error, $errorMessages = [], $code = 400) {
    $response = [
      'success' => false,
      'mensaje' => $error,
    ];

    if(!empty($errorMessages)){
      $response['data'] = $errorMessages;
    }

    return response()->json($response, $code);
  }

  public function sendResponse($result, $message, $code = 200){
    $response = [
      'success' => true,
      'data'    => $result,
      'mensaje' => $message,
    ];
    return response()->json($response, $code);
  }

}
