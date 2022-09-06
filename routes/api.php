<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'Auth\ApiController@register');
Route::post('login', 'Auth\ApiController@login');
Route::get('test', function(){
    helperPrueba();
});

Route::get('/negocios/{rfc}/{tipoObligacion}/{cuenta}', 'FinanzasController@GetfnImprimeDatos');

Route::get('/negocios/{id_negocio}', 'FinanzasController@GetObtieneSubsidio');

Route::get('/negocios/historial/{id_negocio}/{tipoObligacion}/{ej_fiscal}', 'FinanzasController@Gethistorial');

//para guardar en ingresos
Route::post('/pruebas/guarda/{vnum_empleados}/{msj_N_hab_emp}/{msj_declaracion}/{msjnombre}/{mensaje_email}/{msjtel}/{mensaje_fecha}/{vtipo_mov}/{email}/{telefono}/{nombre_contacto}/{Total_a_Pagar}/{vtipoCom_sel}/{vddl_obl_sel}/{vtipo_dec}/{vfecha}/{txtTotalPagar}/{vmes_sel}/{vanio_sel}/{txtImporte_Pagar}/{txtRecargos}/{txtMultas}/{txtSaldo_Pendiente}/{txtImporte_Declaracion}/{txtActualizacion}/{txtImpuestoCargo}/{txtImpuestoFavor}/{vnum_asimilables}/{vnum_otros}/{msjEmpSubcontratados}/{msjRFCEmpresa}/{vrbmotivo}/{msjcel}/{celular}', 'FinanzasController@SetfnGuarda_datos_Declaracion');



Route::group(['prefix' => '/', 'middleware' => ['auth:sanctum']], function(){
    Route::post('logout', 'Auth\ApiController@logout');
    Route::put('user', 'Auth\ApiController@update');


    Route::group(['prefix' => '/negocios'], function(){
      Route::get('/{idUser}/load', function (Request $request) {
            try{
                $misNegocios = \DB::table('negocios')->where('id_usuario', $request->idUser)->get();
                return response()->json([
                    "success" => true,
                    "data" => $misNegocios
                ]);
            }catch(\Exception $e){
                return response()->json([
                    "success" => false,
                    "data" => "No se pudieron cargar los negocios"
                ]);
            }
            return response()->json([
                "success" => true,
                "data" => [
                    [
                        "id" => 1,
                        "nombre" => "GARZA GARCIA NO SE QUE asdasd dsads",
                        "rfc" => "XAXX010101000",
                        "cuenta_estatal" => 1000,
                        "sucursal" => 10,
                        "municipio" => 1,
                        "tipo_obligacion" => 2,
                    ]
                ]
                ], 200);
        });
        Route::post('/', function (Request $request) {
            //return response()->json(['success' => false, 'mensaje' => 'mira we'], 400);
            return response()->json([ "success" => true, "data" => [
                "id" => 2,
                "nombre" => $request->nombre,
                "rfc" => $request->rfc,
                "municipio" => $request->municipio,
                "tipo_obligacion" => $request->tipo_obligacion,
                "cuenta_estatal" => $request->cuenta_estatal,
                "sucursal" => $request->sucursal
            ] ], 201);
        });
        Route::put('/{id}', function (Request $request) {
            //return response()->json(['success' => false, 'mensaje' => 'mira we'], 400);
            return response()->json([ "success" => true, "data" => [
                "nombre" => $request->nombre,
                "rfc" => $request->rfc,
                "municipio" => $request->municipio,
                "tipo_obligacion" => $request->tipo_obligacion,
                "cuenta_estatal" => $request->cuenta_estatal,
                "sucursal" => $request->sucursal
            ] ], 200);
        });
        Route::delete('/{id}', function (Request $request) {
            return response()->json([ "success" => true ], 200);
        });

        Route::get('/{rfc}/adicionales', function (Request $request) {
            //return response()->json([ "success" => false, "mensaje" => "que pedo we"], 400);
            return response()->json([ "success" => true, "data" => [
                'fechaAlta' => '21-Sep-2017',
                'nombreComercial' => 'Garsa Garcia Margarita',
                'fechaInicioOperaciones' => '21-Sep-2007',
                'situacion' => 'Activo',
                'calle' => 'Aldama Ote',
                'entreCalles' => 'Manuel Gonzalez y Esquina',
                'colonia' => 'Morelos',
                'localidad' => 'Ciudad Victoria',
                'cp' => '87050',
                'noExt' => '303',
                'noInt' => 'N/A',
                'email' => 'r_puente@hotmail.com',
                'repLegal' => 'N/A',
                'giroActividadPrincipal' => 'Taquerias y Tamales',
                'telefono' => '0000000000',
                'municipio' => 'Victoria',
                'nombreNegocio' => 'GARsA GARCIA MARGARITA'
            ] ], 200);
        });

        // SUCURSALES

        Route::group(['prefix' => '/{negocio}/sucursales'], function(){
            Route::get('/', function (Request $request) {
                return response()->json([
                    "success" => true,
                    "data" => [
                        [
                            "id" => 1,
                            "nombre" => "VICTORIA",
                            "cuenta" => "1232-009",
                            "id_negocio" => 1,
                            "municipio" => 1,
                            "noEmpleados" => 1,
                            "noAsimilables" => 2,
                            "noOtros" => 3,
                            "subcontratados" => 4,
                            "importe" => 10,
                        ]
                    ]
                    ], 200);
            });
            Route::post('/', function (Request $request) {
                //return response()->json(['success' => false, 'mensaje' => 'mira we'], 400);
                return response()->json([ "success" => true, "data" => [
                    "id" => 2,
                    "nombre" => $request->nombre,
                    "rfc" => $request->rfc,
                    "municipio" => $request->municipio,
                    "tipo_obligacion" => $request->tipo_obligacion,
                    "cuenta_estatal" => $request->cuenta_estatal,
                    "sucursal" => $request->sucursal
                ] ], 201);
            });
            Route::put('/{id}', function (Request $request) {
                //return response()->json(['success' => false, 'mensaje' => 'mira we'], 400);
                return response()->json([ "success" => true, "data" => [
                    "nombre" => $request->nombre,
                    "rfc" => $request->rfc,
                    "municipio" => $request->municipio,
                    "tipo_obligacion" => $request->tipo_obligacion,
                    "cuenta_estatal" => $request->cuenta_estatal,
                    "sucursal" => $request->sucursal
                ] ], 200);
            });
            Route::delete('/{id}', function (Request $request) {
                return response()->json([ "success" => true ], 200);
            });
        });
    });

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
