<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/{any}', function () {
    return view('app');
})->where('any','.*');

Route::match(['get','post'],'/financiera','loginController@login');
Route::match(['get', 'post'], '/salir','loginController@logout');

Route::match(['get','post'], '/loginfinanciera', 'logearController@login');//cliente
Route::match(['get','post'], '/exit', 'logearController@logout');
Route::get('/registrar','logearController@formulario');
Route::post('/registrado','logearController@crear');

Route::resource('/usuario','UsuarioController');
Route::get('/edad', 'UsuarioController@nuevo')->name('usuario.edad');
Route::get('/mostrar/{id}','UsuarioController@mostrar')->name('usuario.mostrar');
Route::get('/edito/{id}','UsuarioController@edito')->name('usuario.edito');
Route::post('/actualizar/{id}','UsuarioController@actualizar')->name('usuario.actualizar');
Route::get('/actualizo/{id}','UsuarioController@actualizo')->name('usuario.actualizo');
Route::post('/reno/{id}','UsuarioController@reno')->name('usuario.reno');
Route::get('/bash', 'UsuarioController@bash')->name('usuario.bash');
Route::post('import-excel', 'UsuarioController@importexcel')->name('usuario.excel');
Route::get('/presta','UsuarioController@presta')->name('usuario.presta');
Route::get('/bienvenido','UsuarioController@bienvenido')->name('usuario.bienvenido');
Route::post('/story','UsuarioController@story')->name('usuario.story');


Route::resource('/cliente', 'ClienteController');
Route::get('/bashoard', 'ClienteController@bashoard')->name('cliente.bashoard');
Route::get('/editar/{id}','ClienteController@editar')->name('cliente.editar');
Route::get('/actualizar/{id}','ClienteController@actualizar')->name('cliente.actualizar');
Route::post('/renovar/{id}','ClienteController@renovar')->name('cliente.renovar');
Route::get('/inicio','ClienteController@inicio')->name('cliente.inicio');
Route::get('/ver', 'ClienteController@ver')->name('cliente.ver');
Route::post('/crear','ClienteController@crear')->name('cliente.crear');
Route::post('/validar/{id}','ClienteController@validar')->name('cliente.validar');
Route::post('import-list-excel', 'ClienteController@importexcel')->name('cliente.import.excel');

Route::resource('/prestamo', 'PrestamoController');

Route::resource('/pago', 'PagosController');
Route::get('pagos-list-excel', 'PagosController@exportExcel')->name('pago.excel');
Route::resource('/nuevo','NuevoController');

Route::get('pagos-excel', 'NuevoController@exportExcel')->name('pagos.excel');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
