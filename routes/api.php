<?php

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test', function(){
     return ['msg' => 'minha primeira API'];
});

Route::namespace('Api')->prefix('v1')->group(function () {

    Route::post('login', 'Auth\LoginJwtController@login')->name('login');

    Route::get('logout', 'Auth\LoginJwtController@logout')->name('logout');

    Route::get('refresh', 'Auth\LoginJwtController@refresh')->name('refresh');

    Route::group(['middleware' => 'jwt.auth'], function(){
        //CORRIGIR ROTA POIS PEGO PACIENTES POR USUARIO
        Route::resource('/patients', 'PatientController');
    
        Route::resource('users', 'UserController');

    });

 
});


