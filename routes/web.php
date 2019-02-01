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

Route::get('/welcome', function () {
    return view('welcome_basic');
})->middleware('auth.basic');

Route::get('/', ['as'=>'home','uses'=>'AppController@index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/admin','RoleController@listUsers')->middleware('auth', 'role:admin')->name('admin.index');

Route::get('/index','RoleController@listUsers')->middleware('auth', 'role:admin')->name('admin.index');



// Route::get('/messages','MessageController@index')->middleware('auth', 'role:user')->name('messages.index');
// Route::get('/messages/create','MessageController@create')->middleware('auth', 'role:user')->name('messages.create');
// Route::post('/messages','MessageController@store')->middleware('auth', 'role:user')->name('messages.store');
// Route::get('/messages/{message}/edit','MessageController@edit')->middleware('auth', 'role:user')->name('messages.edit');
// Route::get('/messages/{message}','MessageController@show')->middleware('auth', 'role:user')->name('messages.show');
// Route::put('/messages/{message}','MessageController@update')->middleware('auth', 'role:user')->name('messages.update');
// Route::delete('/messages/{message}','MessageController@destroy')->middleware('auth', 'role:user')->name('messages.destroy');

Route::resource('messages','MessageController')->middleware('auth', 'role:user');