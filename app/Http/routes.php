<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return 'Primeira Lógica com laravel';
    });


Route::get('/produtos', [
	'as' => 'apelido',
	'uses' => 'ProdutoController@lista']);

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::POST('/produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/teste', function(){
	return view('teste');
});

Route::get('/produtos/json', 'ProdutoController@listaJson');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

Route::get('/produtos/editar/{id}', 'ProdutoController@editar');

Route::POST('/produtos/atualizar/{id}', 'ProdutoController@atualizar');

});
