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

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

/**User Routes*/
/*
 * Resource generates index, update, destroy, and edit routes linked to the UsersController
 * (view with php artisan route:list).
 * Middleware 'can' allows us to run the manage-users gate (defined in AuthServiceProvider) on the
 * 'admin/user/...' routes, ensuring only superadmins can manage users.
 */
Route::match(['get', 'post'], '/user', 'UserController@index')->middleware('can:manage-users');
Route::get('/add-user/create', 'UserController@create')->middleware('can:manage-users');
Route::post('/add-user', 'UserController@store')->middleware('verified')->middleware('can:manage-users');
Route::put('/edit-user/{id}', 'UserController@Update')->middleware('can:edit-users');
Route::match(['get', 'post'], '/account', 'UserController@Account');
//Update current password in  from site settings
//Route::get('/site-settings', 'UserController@siteSettings');
Route::match(['get','post'],'/update-user-pwd', 'UserController@updateUserPassword');

/**Payment Routes*/
Route::get('/pay-offence/{id}', 'PaymentController@viewPayment');
//Lipa na Mpesa
Route::match(['get','post'], '/mpesa', 'PaymentController@customerMpesaSTKPush');

/**Offence Routes*/
Route::match(['get', 'post'], '/add-offenses', 'OffenceController@addOffence');//added by an officer
Route::match(['get', 'post'], '/view-traffic-offenses', 'OffenceController@viewTrafficOffenses');//added by an officer
Route::match(['get', 'post'], '/committed-offenses', 'OffenceController@userOffenses');//user offenses
Route::match(['get', 'post'], '/view-committed-offenses', 'OffenceController@index');
Route::get('/report-offense/create', 'OffenceController@create');
Route::post('/report-offense', 'OffenceController@store');
Route::put('/editoffense/{id}', 'OffenceController@Update');
Route::put('/editcommittedoffense/{id}', 'OffenceController@UpdateCommittedOffence');//for committed offenses

Route::match(['get', 'post'],'/delete_offense/{id}', 'OffenceController@Destroy');
Route::match(['get', 'post'],'/delete_committed_offense/{id}', 'OffenceController@DeleteOffense');
