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

Route::get('/', function ()
 {
    return view('welcome');
});
Route::get('admin', function(){
    return view('layouts.admin'); 
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin', 'Middleware'=>['auth','role:Admin']],function(){
    Route::resource('kategori','KategoriController');
    Route::resource('artikel','ArtikelController');
    Route::resource('galleri','GalleriController');
    Route::resource('panduan','PanduanController');
    Route::resource('about','AboutController');
});
