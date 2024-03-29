<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

use App\Plan;
use Auth;
use App\User;
use App\Notifications\BusinessSubscription;

class SubscriptionsController extends Controller {

 public function __construct() {
  $this->middleware( 'auth' );
  $this->middleware( 'verified' );
  $this->middleware( 'business' );
 }

 public function subscribe( Request $request ) {
  $this->validate( $request, [
   'plan'        => [ 'required' ],
   'stripeToken' => [ 'required' ],
   'coupon'      => [ 'nullable', 'string', 'max:255' ],
  ] );

  $business = $request->user()->business;

  $subscription = $business->newSubscription( 'Storage', $request->plan );
  if ( $request->has( 'coupon' ) && !empty( $request->coupon ) ) {
   $subscription->withCoupon( $request->coupon );
  }
  $subscription = $subscription->create( $request->stripeToken );

  // - notifications
  $admins = User::whereIs( 'admin' )->get();
  Notification::send( $admins, new BusinessSubscription( $business ) );

  return redirect()->route( 'subscriptions.index' );
 }

 public function swap( Request $request, Plan $plan ) {
  $this->validate( $request, [
   'coupon' => [ 'nullable', 'string', 'max:255' ],
  ] );

  $business = $request->user()->business;

  $subscription = $business->subscription( $plan->product_name )->swap( $plan->plan_id );
  if ( $request->has( 'coupon' ) && !empty( $request->coupon ) ) {
   $subscription->withCoupon( $request->coupon );
  }

  return back();
 }

 public function cancel( Request $request, Plan $plan ) {
  $request->user()->business->subscription( $plan->product_name )->cancel();

  return back();
 }


 // - view actions

 public function index() {
  $business = Auth::user()->business;

  return view( 'layouts.wrapper', [ 'page'=>'subscriptions.index-page' ] )
   ->with( 'business', $business );
 }
}
