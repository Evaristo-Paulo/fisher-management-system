<?php

use App\Models\Municipe;
use App\Models\Resource;
use Illuminate\Http\Request;
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


/* Login and Home*/
Route::get('/', 'MainController@home')->name('home');
Route::get('/login', 'MainController@loginForm')->name('login.form');
Route::post('/login', 'MainController@login')->name('login');
Route::get('/logout', 'MainController@logout')->name('logout');
Route::get('/', 'MainController@home')->name('home');

/* User */
Route::get('/usuarios/registo', 'UserController@registerForm')->name('user.register.form');
Route::post('/usuarios/registo', 'UserController@register')->name('user.register');
Route::get('/usuarios', 'UserController@list')->name('user.list');
Route::get('/usuarios/{id}/actualizacao', 'UserController@editForm')->name('user.edit.form');
Route::put('/usuarios/{id}/actualizacao', 'UserController@edit')->name('user.edit');
Route::post('/usuarios/remocao', 'UserController@remove')->name('user.remove');
Route::post('/usuarios/actualizacao-de-senha', 'UserController@changePassword')->name('user.change.password');

/* Fisher */
Route::Post('/armadores/actualizacao-de-fotografia', 'FisherController@changePhoto')->name('fisher.change.photo');
Route::get('/armadores/registo', 'FisherController@registerForm')->name('fisher.register.form');
Route::post('/armadores/registo', 'FisherController@register')->name('fisher.register');
Route::get('/armadores', 'FisherController@list')->name('fisher.list');
Route::get('/armadores/{id}/actualizacao', 'FisherController@editForm')->name('fisher.edit.form');
Route::get('/armadores/{id}/visualizacao', 'FisherController@show')->name('fisher.show');
Route::put('/armadores/{id}/actualizacao', 'FisherController@edit')->name('fisher.edit');
Route::post('/armadores/remocao', 'FisherController@remove')->name('fisher.remove');
Route::post('/armadores/atribuicao-de-captura', 'FisherController@addFreight')->name('fisher.add.freight');
Route::get('/armadores/capturas', 'FisherController@freightList')->name('fisher.freight.list');

/* Capture */
Route::get('/relatorios/captura-por-armadores', 'CaptureController@captureByFishers')->name('relatory.capture.fishers');
Route::post('/relatorios/captura-por-armadores-filtragem', 'CaptureController@captureByFishersFilter')->name('relatory.capture.fishers.filter');
Route::get('/relatorios/captura-por-especies', 'CaptureController@captureBySpecies')->name('relatory.capture.specie');


/* POPULAR PROVÍNCIA/MUNICÍPIO */
Route::get('/ajax-subcat', function ( Request $request ) {
    $province_id = $request->input('province_id');
    $subcategoria = Municipe::where('province_id', '=', $province_id)->get();
    return Response::json($subcategoria);
});

/* POPULAR ESPÉCIE/RECURSO */
Route::get('/ajax-specie-resource', function ( Request $request ) {
    $specie_id = $request->input('specie_id');
    $subcategoria = Resource::where('specie_id', '=', $specie_id)->get();
    return Response::json($subcategoria);
});



