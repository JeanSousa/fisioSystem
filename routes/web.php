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


Route::prefix('system/')->name('system.')->namespace('System')->group(function () {

  Route::get('/patients', 'PatientController@index')->name('patients.index');

  Route::get('/patients/create', 'PatientController@create')->name('patients.create');

  Route::post('/patients/store', 'PatientController@store')->name('patients.store');

});
