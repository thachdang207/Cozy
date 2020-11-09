<?php

use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/admin', function () {
        return "admin";
    });
});
Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/users/data-table', 'Admin\UserController@anyData')->name('users.data');
    Route::get('/criteria/data-table', 'Admin\CriterionController@anyData')->name('criteria.data');
    Route::get('/historical-criteria/data-table', 'Admin\HistoricalCriterionController@anyData')->name('historical-criteria.data');
    Route::put('users/update', 'Admin\UserController@update')->name('update');
    Route::group(['namespace' => 'Admin'], function () {
        Route::resources([
            'users' => 'UserController',
            'criteria' => 'CriterionController',
            'historical-criteria' => 'HistoricalCriterionController'
        ]);
    });
    Route::get('roles', 'Admin\RoleController@index');
});
Route::middleware(['checkRole:admin,staff'])->group(function () {
    Route::get('/report/data-table', 'User\HistoricalCriterionController@anyData')->name('historical-criteria.data');
    Route::get('/report', 'User\HistoricalCriterionController@index')->name('historical-criteria.report');
});
Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
});
Route::get('/home', 'HomeController@index')->name('home');
