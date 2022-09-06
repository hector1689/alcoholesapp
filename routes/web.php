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



require __DIR__.'/auth.php';
