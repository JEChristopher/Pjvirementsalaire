<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'AuthController@loginForm')->name('login-form')->middleware('ifAuthenticated');

Route::post('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('users', 'UserController@index')->name('users.index');

    Route::get('virements', 'VirementController@index')->name('virements.index');
    Route::post('virements', 'VirementController@store')->name('virements.store');
    Route::get('virements/show/{id}', 'VirementController@show')->name('virements.show');
    Route::get('/transfert/{id}', 'VirementController@action')->name('virements.action');
});
Route::any('/notify', 'notifyController@notify');
