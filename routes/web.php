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

// Videos
Route::post( '/videos/upload', 'VideosController@upload' )->name( 'videos.upload' );
Route::delete( '/videos/{video}', 'VideosController@destroy' )->name( 'videos.destroy' );
Route::get( '/videos', 'VideosController@index' )->name( 'videos.index' );
