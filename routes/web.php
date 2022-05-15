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

/* Route::get('/', function () {
    return view('welcome');
});
 */
Auth::routes();



Route::get('/', 'UserController@index')->name('welcome');

Route::group(['prefix' => 'users'], function(){
    Route::post('create', 'UserController@create')->name('create');

    Route::get('get/{id?}', 'UserController@get');

    Route::put('edit', 'UserController@edit')->name('update');

    Route::get('delete/{id}', 'UserController@delete');
});



/* Route::group(['prefix' => 'employee'], function(){

    Route::post('create', 'AdminController@CREATE_EMPLOYEE');

    Route::get('get/{id?}', 'AdminController@GET_EMPLOYEE');

    Route::put('edit/{id}', 'AdminController@EDIT_EMPLOYEE');

    Route::delete('delete/{id}', 'AdminController@DELETE_EMPLOYEE');

}); */