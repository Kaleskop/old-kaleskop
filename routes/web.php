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

Auth::routes();

// Website
Route::get( '/', 'WebsiteController@homepage' )->name( 'website.homepage' );

// Account
Route::get( '/account', 'AccountController@index' )->name( 'account.index' );
