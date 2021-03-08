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

Route::get('/admin/login', 'LoginController@index')->name('login');
Route::post('/admin/login', 'LoginController@login');
Route::post('/admin/logout', 'LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/articles/{article}', 'HomeController@article')->name('home.article');
Route::get('/events/{event}', 'HomeController@event')->name('home.event');
