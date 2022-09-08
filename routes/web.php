<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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



Route::get('/', function () {
    return view('auth.login');
});




/*Route::group(["middleware" => ['auth:sanctum', 'verified']], function(){
*/

  Route::get('/dashboard' , [HomeController::class, 'index'])->name('dashboard');

/*});*/

/*Route::get('/dashboard', 'HomeController@index')->name('dashboard');*/



Route::resource('/dashboard/roles', RoleController::class);
Route::resource('/dashboard/users', UserController::class);
Route::post('/dashboard/users/borrar', 'UserController@destroy');
Route::post('/dashboard/users/agregarusuarios', 'UserController@nuevosUsuarios');


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





//rutas de guardado
/*
fnGrabaVerificacion(Request $request ) funcion que guarda la verificacion proxima a realizar por parte del supervisor

fnGrabaVerificaCroquis(Request $request ) graba croquis de la verificacion

fnGrabaMovimientosVerifica(Request $request ) graba las mediciones realizadas en la verificacion

fnInsertaMulta(Request $request ) graba la multa determinada

fnInsertaRequisto(Request $request ) inserta un nuevo requisito

fnFinalizaVerificacion(Request $request ) finaliza verificacion cambiando estatus a completada pantalla verificaciones_negocio_1
*/

Route::post('/verificacion/guardaMulta', 'AlcoholesController@fnInsertaMulta')->name('guardaMulta');

Route::post('/verificacion/guardaRequisito', 'AlcoholesController@fnInsertaRequisto')->name('guardaRequisito');

Route::post('/verificacion/guardaCroquis', 'AlcoholesController@fnGrabaVerificaCroquis')->name('guardaCroquis');

Route::post('/verificacion/cierraVerificacion', 'AlcoholesController@fnCierraVerifica')->name('cierraVerificacion');

Route::post('/verificacion/guardaDetalle', 'AlcoholesController@fnGrabaMovimientosVerifica')->name('guardaDetalle');

Route::post('/verificacion/guardaVerificacion', 'AlcoholesController@fnGrabaVerificacion')->name('guardaVerificacion');

Route::post('/verificacion/FinalizaVerificacion', 'AlcoholesController@fnFinalizaVerificacion')->name('FinalizaVerificacion');


//

require __DIR__.'/auth.php';
