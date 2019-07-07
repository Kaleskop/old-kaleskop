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
Route::get( '/k/{adv}', 'WebsiteController@endpoint' )->name( 'website.endpoint' );

// Channels
Route::get( '/channels', 'WebsiteController@channels' )->name( 'website.channels' );
Route::get( '/channels/{adv}', 'WebsiteController@advs' )->name( 'website.advs' );

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

// Advs
Route::post( '/advs/store', 'AdvsController@store' )->name( 'advs.store' );
Route::post( '/advs/{adv}/publish', 'AdvsController@publish' )->name( 'advs.publish' );
Route::delete( '/advs/{adv}', 'AdvsController@destroy' )->name( 'advs.destroy' );
Route::delete( '/advs/{adv}/publish', 'AdvsController@unpublish' )->name( 'advs.unpublish' );
Route::get( '/advs', 'AdvsController@index' )->name( 'advs.index' );
Route::get( '/advs/create', 'AdvsController@create' )->name( 'advs.create' );

// Plans
Route::post( '/plans', 'PlansController@store' )->name( 'plans.store' );
Route::patch( '/plans/{plan}', 'PlansController@update' )->name( 'plans.update' );
Route::delete( '/plans/{plan}', 'PlansController@destroy' )->name( 'plans.destroy' );
Route::get( '/plans', 'PlansController@index' )->name( 'plans.index' );
Route::get( '/plans/create', 'PlansController@create' )->name( 'plans.create' );
Route::get( '/plans/{plan}/edit', 'PlansController@edit' )->name( 'plans.edit' );
