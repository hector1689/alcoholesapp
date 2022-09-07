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

Route::get('/negocios/{rfc}/{tipoObligacion}/{cuenta}', 'AlcoholesController@GetfnImprimeDatos');

Route::get('/negocios/{id_negocio}', 'AlcoholesController@GetObtieneSubsidio');

Route::get('/negocios/historial/{id_negocio}/{tipoObligacion}/{ej_fiscal}', 'AlcoholesController@Gethistorial');

//para guardar en ingresos
Route::post('/pruebas/guarda/{vnum_empleados}/{msj_N_hab_emp}/{msj_declaracion}/{msjnombre}/{mensaje_email}/{msjtel}/{mensaje_fecha}/{vtipo_mov}/{email}/{telefono}/{nombre_contacto}/{Total_a_Pagar}/{vtipoCom_sel}/{vddl_obl_sel}/{vtipo_dec}/{vfecha}/{txtTotalPagar}/{vmes_sel}/{vanio_sel}/{txtImporte_Pagar}/{txtRecargos}/{txtMultas}/{txtSaldo_Pendiente}/{txtImporte_Declaracion}/{txtActualizacion}/{txtImpuestoCargo}/{txtImpuestoFavor}/{vnum_asimilables}/{vnum_otros}/{msjEmpSubcontratados}/{msjRFCEmpresa}/{vrbmotivo}/{msjcel}/{celular}', 'AlcoholesController@SetfnGuarda_datos_Declaracion');



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


// a partir de aqui las rutas de alcoholes
/*
    GetEjecutores() sacara el listado de todos los verificadores util para combos
    GetCatalogorequisitos sacara el listado de requisitos util en ventana de alta de multas.
    GetCatalogodependencias sacara listado de dependencias util en alta de multas.
    GetCatalogoMotivos () sacara motivos para alta de multas de alcoholes.
    fnCalculaImporte($municipio, $fecha_determinacion, $id_infraccion, $califica) utilpara alta de multas regrsa importe de la multa y fundamento de sancion y multa.
    GetDatoSimples($municipio, $folio,$tipo) sacara la primer consulta datos del negocio  que se usan como encabezados.

    GetDatosGenerales($municipio, $id_alcoholes) saca datos mas completos para pantalla datos generales.

    GetRequisitos($municipio,$id_alcoholes) obtiene los reuisitos ya presentados de un negocio para pantalla requisitos presentados

    GetpagosRealizados($municipio,$id_alcoholes) sacara los pagos realizados de un negocio

    GetAdeudos($id_alcoholes) sacara lo adeudoso multas  de un negocio

    GetVerificacionesPendientes($municipio, $id_ejecutor) obtendra la verificaciones pendientes de un verificador.

    GetVerificacionesRealizadas($municipio, $id_ejecutor) obtendra la verificaciones ya realizadas por verificaor

    GetResumenVerificaciones($municipio, $id_ejecutor) total de verificaciones pendientes y realizadas pantalla estadisticas

    Gethistorial($id_alcoholes ) obtiene historial , horarios de cierre y apertura
*/



Route::get('/verificadores', 'AlcoholesController@GetEjecutores')->name('ejecutores');

Route::get('/requisitos', 'AlcoholesController@GetCatalogorequisitos')->name('requisitos');

Route::get('/dependencias', 'AlcoholesController@GetCatalogodependencias')->name('dependencias');

Route::get('/motivos', 'AlcoholesController@GetCatalogoMotivos')->name('motivos');

Route::get('/importe_multa/{municipio}/{fecha_determinacion}/{id_infraccion}/{$califica}', 'AlcoholesController@fnCalculaImporte')->name('calculaImporte');

Route::get('/datosSimples/{municipio}/{folio}/{tipo}', 'AlcoholesController@GetDatoSimples')->name('datosSimples');

Route::get('/datosGenerales/{municipio}/{id_alcoholes}', 'AlcoholesController@GetDatosGenerales')->name('datosGenerales');

Route::get('/requisitosContribuyente/{municipio}/{id_alcoholes}', 'AlcoholesController@GetRequisitos')->name('requisitosContribuyente');

Route::get('/pagosRealizados/{municipio}/{id_alcoholes}', 'AlcoholesController@GetpagosRealizados')->name('pagosRealizados');


Route::get('/adeudos/{id_alcoholes}', 'AlcoholesController@GetAdeudos')->name('adeudos');

Route::get('/pendientes/{municipio}/{id_ejecutor}', 'AlcoholesController@GetVerificacionesPendientes')->name('pendientes');


Route::get('/realizadas/{municipio}/{id_ejecutor}', 'AlcoholesController@GetVerificacionesRealizadas')->name('realizadas');

Route::get('/resumen/{municipio}/{id_ejecutor}', 'AlcoholesController@GetResumenVerificaciones')->name('resumen');


Route::get('/historial/{id_alcoholes}', 'AlcoholesController@Gethistorial')->name('historial');


Route::post('/verificacion/guardaRequisito', 'AlcoholesController@fnInsertaRequisto')->name('guardaRequisito');


//rutas de guardado
/*
fnGrabaVerificacion(Request $request ) funcion que guarda la verificacion proxima a realizar por parte del supervisor

fnGrabaVerificaCroquis(Request $request ) graba croquis de la verificacion

fnGrabaMovimientosVerifica(Request $request ) graba las mediciones realizadas en la verificacion

fnInsertaMulta(Request $request ) graba la multa determinada

fnInsertaRequisto(Request $request ) inserta un nuevo requisito

fnFinalizaVerificacion(Request $request ) finaliza verificacion cambiando estatus a completada pantalla verificaciones_negocio_1
*/

Route::post('/verificacion/guardaRequisito', 'AlcoholesController@fnInsertaRequisto')->name('guardaRequisito');

Route::post('/verificacion/guardaCroquis', 'AlcoholesController@fnGrabaVerificaCroquis')->name('guardaCroquis');

Route::post('/verificacion/guardaDetalle', 'AlcoholesController@fnGrabaMovimientosVerifica')->name('guardaDetalle');

Route::post('/verificacion/guardaVerificacion', 'AlcoholesController@fnGrabaVerificacion')->name('guardaVerificacion');

Route::post('/verificacion/FinalizaVerificacion', 'AlcoholesController@fnFinalizaVerificacion')->name('FinalizaVerificacion');


//

Route::get('/inspectores', 'AlcoholesController@GetInspectores')->name('inspectores');

Route::get('/resumen/{municipio}/{id_ejecutor}/{fecha_inicio}/{fecha_fin}', 'AlcoholesController@GetResumenVerificaciones')->name('resumen');

Route::get('/municipios', 'AlcoholesController@GetMunicipios')->name('municipios');
