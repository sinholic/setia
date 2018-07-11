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

// Route::group(['middleware' => ['auth']],function () {
    // Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home.index']);
    // Route::get('/', function () {
    //     return view('frontend.main');
    // });
    Route::get('/', ['uses' => 'NewsController@index', 'as' => 'frontend.index']);
    Route::group([
            'prefix'=>'admin'
        ],function () {
            Route::get('/', ['uses' => 'AdminController@index', 'as' => 'admin.index']);
            Route::get('/login', ['uses' => 'AdminController@login', 'as' => 'admin.login']);
            Route::get('improvement', ['uses' => 'HomeController@improvement', 'as' => 'home.improvement']);
    });
    Route::group([
            'prefix'=>'news'
        ],function () {
            Route::get('/', ['uses' => 'NewsController@index', 'as' => 'frontend.index']);
            Route::get('/detail/{id}', ['uses' => 'NewsController@detail', 'as' => 'frontend.detail']);
    });
    Route::group([
            'prefix'=>'data'
        ],function () {
            Route::get('/roaming', ['uses' => 'DataBIController@index', 'as' => 'frontend.index']);
            Route::get('/handset', ['uses' => 'DataBIController@handset', 'as' => 'frontend.handset']);
    });
    Route::group([
            'prefix'=>'reporting'
        ],function () {
        Route::get('/', ['uses' => 'ReportingController@index', 'as' => 'reporting.index']);
        Route::get('/show/{type?}', ['uses' =>'ReportingController@show', 'as' => 'reporting.show.detail']);
        Route::get('/download/{type?}', ['uses' =>'ReportingController@download', 'as' => 'reporting.download.detail']);
		Route::get('monthlyreport',array('as'=>'monthlyreport','uses'=>'ReportingController@monthlyreport'));

        Route::post('/showperdate', ['uses' =>'ReportingController@showperdate', 'as' => 'reporting.activities.show.showperdate']);

    });
    Route::resource('transitionprogress', 'TransitionprogressController');
    Route::get('dailycheck', 'AoactivitydailyController@checklistact');
    Route::get('insertact', 'AoactivitydailyController@insertact');
    Route::get('issuecheck', 'AoissueController@issuecheck2');
    Route::resource('aoactivitydaily', 'AoactivitydailyController');
    Route::get('tickets/{status?}', ['uses' =>'TicketController@index', 'as' => 'tickets.index']);
    Route::group([
            'prefix'=>'time-sheet'
        ],function () {
        Route::get('activitydetails/type/{activitytypes?}', ['uses' =>'ActivitydetailController@index', 'as' => 'activitydetails.index']);
        Route::match(['PUT', 'PATCH'], "activitydetails/update/{id?}", [ 'uses' => 'ActivitydetailController@update', 'as' => 'activitydetails.update']);
        Route::post('activitydetails/add', ['uses' =>'ActivitydetailController@store', 'as' => 'activitydetails.store']);
        Route::get('activitydetails/show/{id?}', ['uses' =>'ActivitydetailController@show', 'as' => 'activitydetails.show']);
    });
    Route::group([
            'prefix'=>'issue'
        ],function () {
        Route::resource('ctmissues', 'CtmissueController');
		Route::resource('aoissues', 'AoissueController');
		Route::get('bptoms/viewupdatebptoms', ['uses' =>'BptomsController@viewupdatebptoms', 'as' => 'bptoms.viewupdatebptoms']);
        Route::resource('bptoms', 'BptomsController');
        Route::post('bptoms/add', ['uses' =>'BptomsController@view', 'as' => 'bptoms.view']);
        Route::resource('bptomsbodependent', 'BptomsbodependentController');
        Route::resource('bptomsboprerequisite', 'BptomsboprerequisiteController');
    });
    Route::group([
            'prefix'=>'tools'
        ],function () {
            Route::resource('bigactivities', 'BigactivityController');
        Route::group([
                'middleware' => ['position'],
                'position' => ['Root', 'Team Leader', 'Operation Manager']
            ],function () {
            Route::resource('applications', 'ApplicationController');
            Route::resource('applicationtypes', 'ApplicationtypeController');
            Route::resource('activities', 'ActivityController');
            Route::resource('activitystatus', 'ActivitystatusController');
            Route::resource('activitytypes', 'ActivitytypeController');
            Route::resource('controlmpics', 'ControlmpicController');
            Route::resource('departments', 'DepartmentController');
            Route::resource('impacts', 'ImpactController');
            Route::resource('organizations', 'OrganizationController');
            Route::resource('personincharges', 'PersoninchargeController');
            Route::resource('positions', 'PositionController');
            Route::resource('remedygroups', 'RemedygroupController');
            Route::resource('severities', 'SeverityController');
            Route::resource('subdepartments', 'SubdepartmentController');
    		Route::resource('teams', 'TeamController');
            Route::resource('towerpics', 'TowerpicController');
            Route::resource('users', 'UserController');
        });
    });
// });
