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
Route::get( '/account/business', 'AccountController@business' )->name( 'account.business' );

// Business
Route::post( '/account/business', 'BusinessController@store' )->name( 'business.store' );
Route::get( '/business', 'BusinessController@index' )->name( 'business.index' );
Route::get( '/business/subscriptions', 'BusinessController@subscriptions' )->name( 'business.subscriptions' );

// Videos
Route::post( '/videos/upload', 'VideosController@upload' )->name( 'videos.upload' );
Route::delete( '/videos/{video}', 'VideosController@destroy' )->name( 'videos.destroy' );
Route::get( '/videos', 'VideosController@index' )->name( 'videos.index' );
Route::get( '/videos/create', 'VideosController@create' )->name( 'videos.create' );

// Subscriptions
Route::post( '/subscriptions/subscribe', 'SubscriptionsController@subscribe' )->name( 'subscriptions.subscribe' );
Route::patch( '/subscriptions/{plan}/swap', 'SubscriptionsController@swap' )->name( 'subscriptions.swap' );
Route::delete( '/subscriptions/{plan}/cancel', 'SubscriptionsController@cancel' )->name( 'subscriptions.cancel' );
