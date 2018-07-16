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

Auth::routes();
Route::get('/', ['uses' => 'NewsController@index', 'as' => 'frontend.index']);
Route::group([
        'prefix'=>'news'
    ],function () {
        // Route::get('/', ['uses' => 'NewsController@index', 'as' => 'frontend.index']);
        Route::get('/detail/{id}', ['uses' => 'NewsController@detail', 'as' => 'frontend.detail']);
});

Route::group(['middleware' => ['auth']],function () {
    // Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home.index']);
    // Route::get('/', function () {
    //     return view('frontend.main');
    // });

    Route::group([
            'prefix'=>'admin'
        ],function () {
        Route::get('dashboard', ['uses' => 'AdminController@index', 'as' => 'admin.index']);
        Route::group([
                'prefix'=>'master'
            ],function () {
                Route::get('/', ['uses' => 'AdminController@index', 'as' => 'admin.master']);
                Route::resource('continent', 'ContinentController');
                Route::resource('exchangerate', 'ExchangerateController');
                Route::resource('groupoperator', 'GroupoperatorController');
                Route::resource('kota', 'KotaController');
                Route::resource('msc', 'MscController');
                Route::resource('negara', 'NegaraController');
                Route::resource('operator', 'OperatorController');
                Route::resource('telintarif', 'TelintariffController');
        });
    });

});
