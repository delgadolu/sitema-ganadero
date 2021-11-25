<?php

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('type_user', 'TypeUsersController');
Route::resource('Tipo_Animal', 'TipoAnimalController');
Route::resource('finca', 'FincaController');
Route::resource('sanidad', 'SanidadController');
Route::resource('gestacion', 'GestacionController');
Route::resource('toros', 'TorosController');
Route::resource('Vacas', 'VacasController');
Route::resource('becerros', 'BecerrosController');
Route::resource('becerras', 'BecerrasController');
Route::resource('toretes', 'ToretesController');
Route::resource('mautas', 'MautasController');
Route::resource('nobillas', 'NobillasController');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('toros_download', 'TorosController@download');
Route::get('Vacas_download', 'VacasController@download');
Route::get('toretes_download', 'ToretesController@download');
Route::get('nobillas_download', 'NobillasController@download');
Route::get('mautas_download', 'MautasController@download');
Route::get('becerros_download', 'BecerrosController@download');
Route::get('becerras_download', 'BecerrasController@download');

Route::view('sessions/signIn', 'sessions.signIn')->name('signIn');
Route::view('sessions/signUp', 'sessions.signUp')->name('signUp');
Route::view('sessions/forgot', 'sessions.forgot')->name('forgot');


Route::view('others/notFound', 'others.notFound')->name('notFound');
Route::view('others/user-profile', 'others.user-profile')->name('user-profile');
Route::view('others/starter', 'others.starter')->name('starter');


