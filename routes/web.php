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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
	Route::group(['prefix'=>'receitas', 'where'=>['id'=>'[0-9]+']], function(){
		Route::get('',				['as'=>'receitas', 			'uses'=>'ReceitasController@index']);
		Route::get('create', 		['as'=>'receitas.create', 	'uses'=>'ReceitasController@create']);
		Route::post('store',		['as'=>'receitas.store',	'uses'=>'ReceitasController@store']);
		Route::get('{id}/edit',		['as'=>'receitas.edit',		'uses'=>'ReceitasController@edit']);	
		Route::put('{id}/update', 	['as'=>'receitas.update',	'uses'=>'ReceitasController@update']);
	});
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
