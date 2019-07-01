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

// Account
Route::get( '/account/business', 'AccountController@business' )->name( 'account.business' );

// Business
Route::post( '/account/business', 'BusinessController@store' )->name( 'business.store' );
Route::get( '/business', 'BusinessController@index' )->name( 'business.index' );
Route::get( '/business/subscriptions', 'BusinessController@subscriptions' )->name( 'business.subscriptions' );
