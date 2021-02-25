<?php
use Illuminate\Support\Facades\Auth;
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



Route::group(['middleware' => 'auth'], function () {
    Route::get('/clients', 'MainController@client')->name('clients');

});
Route::post('/clientAdd', 'MainController@clientAdd')->name('clientAdd');
Route::post('/clientDelete/{id}', 'MainController@clientDelete')->name('clientDelete');
Route::post('/clientEdit/{id}', 'MainController@clientEdit')->name('clientEdit');
Route::post('/flightAdd', 'MainController@flightAdd')->name('flightAdd');
Route::post('/flightDelete/{id}', 'MainController@flightDelete')->name('flightDelete');
Route::post('/flightEdit/{id}', 'MainController@flightEdit')->name('flightEdit');
Route::post('/flightFinding', 'MainController@flightFinding')->name('flightFinding');
Route::post('/accessReserve', 'MainController@reservationProcess')->name('reservationProcess');
Route::post('/accessFlightEdit','MainController@flightEditProcess')->name('flightEditProcess'); //ТЕСТ
Route::post('/accessClientEdit', 'MainController@clientEditProcess')->name('clientEditProcess');
Route::get('/home', 'MainController@home')->name('home');
//Route::get('/flightFinding', 'MainController@flightFinding')->name('flightFinding');
Route::get('/flights', 'MainController@flight')->name('flights');
Route::get('/services', 'MainController@service')->name('services');
Route::get('/reserves/{id}', 'MainController@reserve')->name('reserves');
Route::post('/client/ajax', 'MainController@client_ajax')->name('client.ajax');
Route::post('/flight/ajax', 'MainController@flight_ajax')->name('flight.ajax');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

