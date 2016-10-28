<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('kinetic.home');
});

Route::group(['prefix'=> 'admin', 'middleware' => ['role:admin']], function () {
    CRUD::resource('company', 'Admin\CompanyCrudController');
    CRUD::resource('role', 'Admin\RoleCrudController');
    CRUD::resource('permission', 'Admin\PermissionCrudController');
    CRUD::resource('user', 'Admin\UserCrudController');
    CRUD::resource('businesstype', 'Admin\BusinessTypeCrudController');
    CRUD::resource('adformat', 'Admin\AdFormatCrudController');
    CRUD::resource('state', 'Admin\StateCrudController');
    CRUD::resource('town', 'Admin\TownCrudController');
    CRUD::resource('sitelocation', 'Admin\SiteLocationCrudController');
    CRUD::resource('entry', 'Admin\EntryCrudController');

    Route::get('map', 'Admin\MapController@index');
});
