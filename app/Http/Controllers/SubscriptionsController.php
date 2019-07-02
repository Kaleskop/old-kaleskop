<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;

class SubscriptionsController extends Controller {

 public function __construct() {
  $this->middleware( 'auth' );
  $this->middleware( 'business' );
 }

 public function subscribe( Request $request ) {
  $this->validate( $request, [
   'plan'        => [ 'required' ],
   'stripeToken' => [ 'required' ],
   'coupon'      => [ 'nullable', 'string', 'max:255' ]
  ] );

  $business = $request->user()->business;

  $subscription = $business->newSubscription( 'Storage', $request->plan );
  if ( $request->has( 'coupon' ) && !empty( $request->coupon ) ) {
   $subscription->withCoupon( $request->coupon );
  }
  $subscription = $subscription->create( $request->stripeToken );

  return back();
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
}
