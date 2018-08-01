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
        Route::get('/pageBI/{id}', ['uses' => 'DataBIController@handset', 'as' => 'frontend.handset']);
        Route::get('/roaming', ['uses' => 'DataBIController@index', 'as' => 'frontend.roaming']);
        Route::get('/category/{id}', ['uses' => 'NewsController@bycategory', 'as' => 'frontend.category']);
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
                Route::resources([
                    'continent'     => 'ContinentController',
                    'exchangerate'  => 'ExchangerateController',
                    'groupoperator' => 'GroupoperatorController',
                    'kota'          => 'KotaController',
                    'msc'           => 'MscController',
                    'negara'        => 'NegaraController',
                    'operator'      => 'OperatorController',
                    'telintarif'    => 'TelintariffController'
                ]);
        });
        Route::resource('categorynews', 'CategoryNewsController');
        Route::resource('newscrud', 'NewsCrudController');
        Route::resource('user', 'UserController');
        Route::resource('groupuser', 'GroupUserController');
        Route::resource('menu', 'MenuController');
        Route::resource('groupmenu', 'GroupMenuController');
    });

});
