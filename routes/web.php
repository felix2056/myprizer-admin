<?php

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

Route::match(['get', 'post'], 'login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::match(['get', 'post'], 'forgot', 'AuthController@forgot')->name('forgot');

Route::get('/', 'DashboardController@index')->name('index');

Route::prefix('prizes')->group(function () {
    Route::get('', 'PrizesController@index')->name('prizes.index');
    Route::match(['get', 'post'], 'create', 'PrizesController@create')->name('prizes.create');
    Route::match(['get', 'put'], '{slug}/edit', 'PrizesController@edit')->name('prizes.edit');
    Route::delete('{slug}/delete', 'PrizesController@destroy')->name('prizes.destroy');
});

Route::prefix('categories')->group(function () {
    Route::get('', 'CategoriesController@index')->name('categories.index');
    Route::post('create', 'CategoriesController@create')->name('categories.create');
    Route::put('{slug}/edit', 'CategoriesController@edit')->name('categories.edit');
    Route::delete('{slug}/delete', 'CategoriesController@destroy')->name('categories.destroy');
});

Route::prefix('players')->group(function () {
    Route::get('', 'UsersController@index')->name('players.index');
    Route::match(['get', 'post'], 'create', 'UsersController@create')->name('players.create');
    Route::match(['get', 'put'], '{id}/edit', 'UsersController@edit')->name('players.edit');
    Route::delete('{id}/delete', 'UsersController@destroy')->name('players.destroy');
});

Route::prefix('staff')->group(function () {
    Route::get('', 'StaffController@index')->name('staff.index');
    Route::match(['get', 'post'], 'create', 'StaffController@create')->name('staff.create');
    Route::match(['get', 'put'], '{id}/edit', 'StaffController@edit')->name('staff.edit');
    Route::delete('{id}/delete', 'StaffController@destroy')->name('staff.destroy');

    Route::post('upload-photo', 'StaffController@uploadPhoto')->name('staff.upload-photo');
});

Route::match(['get', 'put'], 'site-settings', 'DashboardController@siteSettings')->name('site-settings');