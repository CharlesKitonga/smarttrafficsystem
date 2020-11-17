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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');;

Route::match(['get', 'post'], '/user', 'UserController@index');

/**Offence Routes*/
Route::match(['get', 'post'], '/add-offenses', 'OffenceController@addOffence');//added by an officer
Route::match(['get', 'post'], '/view-traffic-offenses', 'OffenceController@viewTrafficOffenses');//added by an officer
Route::match(['get', 'post'], '/view-committed-offenses', 'OffenceController@index');
Route::get('/report-offense/create', 'OffenceController@create');
Route::post('/report-offense', 'OffenceController@store');
Route::put('/editoffense/{id}', 'OffenceController@Update');
Route::put('/editcommittedoffense/{id}', 'OffenceController@UpdateCommittedOffence');//for committed offenses

Route::match(['get', 'post'],'/delete_offense/{id}', 'OffenceController@Destroy');
Route::match(['get', 'post'],'/delete_coomitted_offense/{id}', 'OffenceController@DeleteOffense');
