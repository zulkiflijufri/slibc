<?php

use Illuminate\Support\Facades\Route;

Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
Route::resource('categories', 'CategoryController');
Route::resource('events', 'EventController')->except('show');
Route::resource('articles', 'ArticleController');
