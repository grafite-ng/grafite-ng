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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/v1'], function() {
  Route::resource('mensagens', 'MensagemController', [
    'only' => ['index', 'show', 'store', 'destroy']
  ]);

  Route::resource('tags', 'TagController', [
    'only' => ['index']
  ]);

  Route::resource('locais', 'LocalController', [
    'only' => ['index']
  ]);

  Route::resource('tags.mensagens', 'MensagemDeTagController', [
    'only' => ['index', 'show']
  ]);

  Route::resource('locais.mensagens', 'MensagemDeLocalController', [
    'only' => ['index', 'show']
  ]);

});
