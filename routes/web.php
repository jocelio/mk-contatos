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

Auth::routes();


Route::middleware(['auth'])->group(function () {


    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/contacts', 'ContactController@index')->name('contacts');
    Route::get('/contacts/create', 'ContactController@create');
    Route::post('/contacts/insert', 'ContactController@insert');
    Route::get('/contacts/{report}/edit', 'ContactController@edit');
    Route::post('/contacts/{report}', 'ContactController@update');
    Route::delete('/contacts/{report}', 'ContactController@delete');


    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::get('/categories/create', 'CategoryController@create');
    Route::post('/categories/insert', 'CategoryController@insert');
    Route::get('/categories/{report}/edit', 'CategoryController@edit');
    Route::post('/categories/{report}', 'CategoryController@update');
    Route::delete('/categories/{report}', 'CategoryController@delete');
});
