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

//Route::get('/', 'MainConrtoller@index')->name('index');

Route::match(['get','post'],'/', 'MainController@index')->name('index');

Route::match(['get','post'],'/st', 'MainController@st')->name('st');

Route::match(['get','post'],'/st2', 'MainController@st2')->name('st2');

Route::match(['get','post'],'/st2-show/{post}', 'MainController@st2show')->name('file.show');

Route::match(['get','post'],'/st2-dnld/{post}', 'MainController@st2dnld')->name('file.download');

