<?php

use Illuminate\Http\Request;

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

Route::group([
        'prefix'=>'admin'
    ],function () {
        Route::get('negara-detail/{id}', ['uses' => 'NegaraController@detailNegara', 'as' => 'api.admin.negara.detail']);
        Route::get('telintarif-detail/{id}', ['uses' => 'TelintariffController@detailTarif', 'as' => 'api.admin.telintarif.detail']);
        Route::get('operator-detail/{id}', ['uses' => 'OperatorController@detailOperator', 'as' => 'api.admin.operator.detail']);
});
