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
    return redirect('home');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('system')->name('system.')->namespace('System')->group(function () {

   Route::resource('patients', 'PatientController');

   Route::resource('evolutions', 'EvolutionController');

   Route::post('evolutions/report', 'EvolutionController@printPdf')
   ->name('evolutions.report');

   Route::post('evolutions/filters', 'EvolutionController@filters')
   ->name('evolutions.filters');

});
