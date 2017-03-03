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

Route::get('/company/', array('uses' => 'CompanyController@index'));
Route::get('/company/{enterprise}', array('uses' => 'CompanyController@show'));


Route::get('/company/manage/Enterprise/', array('uses' => 'EnterpriseController@showAll'));
Route::get('/company/manage/TrainingProvider/', array('uses' => 'TrainingProviderController@showAll'));


Route::get('/company/manage/Enterprise/{id}', array('uses' => 'EnterpriseController@manage'));
Route::get('/company/manage/TrainingProvider/{id}', array('uses' => 'TrainingProviderController@manage'));

// Route::get('/company/manage/{type}/{id}', array('uses' => 'CompanyController@manage'));

Route::get('/company/manage/{type}/{id}/analytics', array('uses' => 'AnalyticsController@show'));
Route::get('/company/manage/{type}/{id}/theme', array('uses' => 'CompanyController@theme'));
