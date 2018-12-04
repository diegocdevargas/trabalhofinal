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



Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
	    return view('home');
	});
	Route::group(['prefix'=>'receitas', 'where'=>['id'=>'[0-9]+']], function(){
		Route::any('',				['as'=>'receitas', 			 'uses'=>'ReceitasController@index']);
		Route::get('relatorio', 	['as'=>'receitas.relatorio', 'uses'=>'ReceitasController@geraPdf']);
		Route::get('create', 		['as'=>'receitas.create', 	 'uses'=>'ReceitasController@create']);
		Route::get('{id}/destroy',	['as'=>'receitas.destroy',	 'uses'=>'ReceitasController@destroy']);
		Route::get('{id}/edit',		['as'=>'receitas.edit',		 'uses'=>'ReceitasController@edit']);	
		Route::put('{id}/update', 	['as'=>'receitas.update',	 'uses'=>'ReceitasController@update']);
		Route::post('store',		['as'=>'receitas.store',	 'uses'=>'ReceitasController@store']);
	});
	Route::group(['prefix'=>'receitasfuturas', 'where'=>['id'=>'[0-9]+']], function(){
		Route::get('',				['as'=>'receitasfuturas', 			 'uses'=>'ReceitasFuturasController@index']);
		// Route::get('relatorio', 	['as'=>'receitasfuturas.relatorio',  'uses'=>'ReceitasFuturasController@geraPdf']);
		Route::get('create', 		['as'=>'receitasfuturas.create', 	 'uses'=>'ReceitasFuturasController@create']);
		Route::get('{id}/destroy',	['as'=>'receitasfuturas.destroy',	 'uses'=>'ReceitasFuturasController@destroy']);
		Route::get('{id}/edit',		['as'=>'receitasfuturas.edit',		 'uses'=>'ReceitasFuturasController@edit']);	
		Route::put('{id}/update', 	['as'=>'receitasfuturas.update',	 'uses'=>'ReceitasFuturasController@update']);
		Route::post('store',		['as'=>'receitasfuturas.store',	 	 'uses'=>'ReceitasFuturasController@store']);
	});
	Route::group(['prefix'=>'perfis', 'where'=>['id'=>'[0-9]+']], function(){
		Route::get('',				['as'=>'perfis', 			'uses'=>'PerfisController@index']);
		Route::get('create', 		['as'=>'perfis.create', 	'uses'=>'PerfisController@create']);
		Route::get('{id}/destroy',	['as'=>'perfis.destroy',	'uses'=>'PerfisController@destroy']);
		Route::get('{id}/edit',		['as'=>'perfis.edit',		'uses'=>'PerfisController@edit']);	
		Route::put('{id}/update', 	['as'=>'perfis.update',		'uses'=>'PerfisController@update']);
		Route::post('store',		['as'=>'perfis.store',		'uses'=>'PerfisController@store']);

		Route::get('createmaster',  ['as'=>'perfis.createmaster', 'uses'=>'PerfisController@createmaster']);
		Route::post('masterdetail', ['as'=>'perfis.masterdetail', 'uses'=>'PerfisController@masterdetail']);
	});
	Route::group(['prefix'=>'despesas', 'where'=>['id'=>'[0-9]+']], function(){
		Route::any('',				['as'=>'despesas', 			 'uses'=>'DespesasController@index']);
		Route::get('relatorio', 	['as'=>'despesas.relatorio', 'uses'=>'DespesasController@geraPdf']);
		Route::get('create', 		['as'=>'despesas.create', 	 'uses'=>'DespesasController@create']);
		Route::get('{id}/destroy',	['as'=>'despesas.destroy',	 'uses'=>'DespesasController@destroy']);
		Route::get('{id}/edit',		['as'=>'despesas.edit',		 'uses'=>'DespesasController@edit']);	
		Route::put('{id}/update', 	['as'=>'despesas.update',	 'uses'=>'DespesasController@update']);
		Route::post('store',		['as'=>'despesas.store',	 'uses'=>'DespesasController@store']);
	});
	Route::group(['prefix'=>'despesasfuturas', 'where'=>['id'=>'[0-9]+']], function(){
		Route::get('',				['as'=>'despesasfuturas', 			 'uses'=>'DespesasFuturasController@index']);
		// Route::get('relatorio', 	['as'=>'despesasfuturas.relatorio',  'uses'=>'DespesasFuturasController@geraPdf']);
		Route::get('create', 		['as'=>'despesasfuturas.create', 	 'uses'=>'DespesasFuturasController@create']);
		Route::get('{id}/destroy',	['as'=>'despesasfuturas.destroy',	 'uses'=>'DespesasFuturasController@destroy']);
		Route::get('{id}/edit',		['as'=>'despesasfuturas.edit',		 'uses'=>'DespesasFuturasController@edit']);	
		Route::put('{id}/update', 	['as'=>'despesasfuturas.update',	 'uses'=>'DespesasFuturasController@update']);
		Route::post('store',		['as'=>'despesasfuturas.store',	     'uses'=>'DespesasFuturasController@store']);
	});
	Route::group(['prefix'=>'perfisdespesas', 'where'=>['id'=>'[0-9]+']], function(){
		Route::get('',				['as'=>'perfisdespesas', 			'uses'=>'PerfisdController@index']);
		Route::get('create', 		['as'=>'perfisdespesas.create', 	'uses'=>'PerfisdController@create']);
		Route::get('{id}/destroy',	['as'=>'perfisdespesas.destroy',	'uses'=>'PerfisdController@destroy']);
		Route::get('{id}/edit',		['as'=>'perfisdespesas.edit',		'uses'=>'PerfisdController@edit']);	
		Route::put('{id}/update', 	['as'=>'perfisdespesas.update',		'uses'=>'PerfisdController@update']);
		Route::post('store',		['as'=>'perfisdespesas.store',		'uses'=>'PerfisdController@store']);

		Route::get('createmaster',  ['as'=>'perfisdespesas.createmaster', 'uses'=>'PerfisdController@createmaster']);
		Route::post('masterdetail', ['as'=>'perfisdespesas.masterdetail', 'uses'=>'PerfisdController@masterdetail']);
	});
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
	
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Auth::routes();