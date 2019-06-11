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
    return view('pages/index');
})->name('index');
Route::get('/contact', function () {
    return view('pages/contact');
});
Route::get('/about', function () {
    return view('pages/about');
});
Route::get('/login', function () {
    return view('pages/login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/papers','ArticleController');
Route::post('/papers','ArticleController@store')->name('pap');
Route::resource('archives', 'ArchiveController');
Route::resource('publish', 'PublishController');
