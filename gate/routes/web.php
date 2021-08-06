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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function () {
    Route::prefix('user')->group(function () {
        //list user
        Route::get('/','UserController@index')->name('user.index');
        //create user
        Route::get('/create','UserController@create')->name('user.add');
        Route::post('/create','UserController@store')->name('user.postadd');
        //edit user
        Route::get('/edit/{id}','UserController@edit')->name('user.edit');
        Route::post('/update/{id}','UserController@update')->name('user.update');
        //delete user
        Route::get('/delete','UserController@delete')->name('user.delete');
    });
});