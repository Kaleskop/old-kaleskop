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

Auth::routes( [ 'verify'=>true ] );

// stripe
Route::post( '/stripe/webhook', '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook' );

// Website
Route::get( '/', 'WebsiteController@homepage' )->name( 'website.homepage' );
Route::get( '/k/{adv}', 'WebsiteController@endpoint' )->name( 'website.endpoint' );
Route::get( '/pricing', 'WebsiteController@pricing' )->name( 'website.pricing' );

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
Route::post('/advs/upload', 'AdvsController@upload')->name('advs.upload');
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

// Subscriptions
Route::post( '/subscriptions/subscribe', 'SubscriptionsController@subscribe' )->name( 'subscriptions.subscribe' );
Route::patch( '/subscriptions/{plan}/swap', 'SubscriptionsController@swap' )->name( 'subscriptions.swap' );
Route::delete( '/subscriptions/{plan}/cancel', 'SubscriptionsController@cancel' )->name( 'subscriptions.cancel' );
Route::get( '/subscriptions', 'SubscriptionsController@index' )->name( 'subscriptions.index' );

// Terms
Route::get( '/terms/general', 'TermsController@general' )->name( 'terms.general' );
Route::get( '/terms/account', 'TermsController@account' )->name( 'terms.account' );
Route::get( '/terms/business', 'TermsController@business' )->name( 'terms.business' );

// Blog
Route::get( '/blog/the-intro', 'BlogController@theintro' )->name( 'blog.theintro' );
Route::get( '/blog/collection', 'BlogController@collection' )->name( 'blog.collection' );

// Notifications
Route::post( '/notifications/{notification}/read', 'NotificationsController@read' )->name( 'notifications.read' );

// Newsletter
Route::post( '/newsletters/subscribe', 'NewslettersController@subscribe' )->name( 'newsletters.subscribe' );
