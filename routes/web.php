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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// dashboard group
Route::group(['prefix' => '/dashboard'],function ()
{
    Route::get('/', 'DashboardController@index')->name('dashboard');
});
Route::post('/users/store', 'UserController@store')->name('users.store');
Route::patch('/users/update', 'UserController@update')->name('users.update');

// incident_types
Route::get('incident-types', 'IncidentTypeController@index')->name('incidentTypes.index');
Route::get('incident-types/create', 'IncidentTypeController@create')->name('incidentTypes.create');
Route::post('incident-types/store', 'IncidentTypeController@store')->name('incidentTypes.store');
Route::get('incident-types/{incidentType}/edit', 'IncidentTypeController@edit')->name('incidentTypes.edit');
Route::patch('incident-types/update', 'IncidentTypeController@update')->name('incidentTypes.update');
Route::delete('incident-types/delete', 'IncidentTypeController@destroy')->name('incidentTypes.destroy');

// incidents
Route::get('incidents', 'IncidentController@index')->name('incidents.index');
Route::get('incidents/{incident}/edit', 'IncidentController@edit')->name('incidents.edit');
Route::patch('incidents/update', 'IncidentController@update')->name('incidents.update');
Route::delete('incidents/delete', 'IncidentController@destroy')->name('incidents.destroy');

// users
Route::get('/users', 'UserController@index')->name('users.index');
