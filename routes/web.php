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
    return view('index');
})->name('index');

Route::get('/login/qiita', 'Auth\LoginController@redirectToProvider')->name('qiitaLogin');
Route::get('/login/qiita/callback', 'Auth\LoginController@handleProviderCallback')->name('qiitaCallback');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home/{any?}', 'HomeController@index')->where('any', '.+');

    Route::get('/api/books', 'BookController@index');
    Route::post('/api/books/store', 'BookController@store');
    Route::get('/api/books/{id}', 'BookController@show');
    Route::post('/api/books/{id}/update', 'BookController@update');
    Route::post('/api/books/{id}/delete', 'BookController@destroy');
});
