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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('auth.login');
});

Route::get('painel', function () {
    return redirect()->route('login');
});

Route::group(['prefix' => 'panel', 'as' => 'panel.', 'middleware' => ['auth'], 'namespace' => 'Panel'], function () {
    Route::resource('task', 'TaskController', ['except' => 'show','update']);  
});
