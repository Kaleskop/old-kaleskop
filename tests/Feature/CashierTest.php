<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Business;
use App\User;
use Storage;
use App\Plan;

class CashierTest extends TestCase {

 use RefreshDatabase;

 protected $planData = [ 'plan'=>'plan_F7VBkOHU297sxU', 'stripeToken'=>'tok_visa' ];

 public function test_AuthUser_BusinessRegistrationCreateStripeCustomer_NotNullStripeId() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->make( [ 'terms'=>'true' ] );
  $this->post( route( 'business.store' ), $business->toArray() );

  $business = Business::where( 'vat', $business->vat )->first();

  $this->assertNotNull( $business->stripe_id );
 }

 public function test_BusinessUserCanSubscribeToPlan_HasSubscription() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->create( [ 'user_id'=>$user->id ] );

  $response = $this->post( route( 'subscriptions.subscribe' ), $this->planData );

  $this->assertDatabaseHas( 'subscriptions', [ 'business_id'=>$business->id ] );
  $response->assertRedirect( route( 'subscriptions.index' ) );
 }

 public function test_SubscribedUser_CanSwapToPlan_HasSubscription() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->create( [ 'user_id'=>$user->id ] );
  $this->post( route( 'subscriptions.subscribe' ), $this->planData );

  $plan = factory( Plan::class )->create( [
   'product_id'=>'prod_F7VA2ugAWXZIhT',
   'product_name'=>'Storage',
   'plan_id'=>'plan_FAtbGzr51Osl6K'
  ] );
  $response = $this->patch( route( 'subscriptions.swap', $plan ) );

  $this->assertDatabaseHas( 'subscriptions', [ 'business_id'=>$business->id, 'stripe_plan'=>$plan->plan_id ] );
 }

 public function test_SubscribedUser_CanCancelSubscription_HasSubscription() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->create( [ 'user_id'=>$user->id ] );
  $this->post( route( 'subscriptions.subscribe' ), $this->planData );

  $plan = factory( Plan::class )->create( [
   'product_id'=>'prod_F7VA2ugAWXZIhT',
   'product_name'=>'Storage',
   'plan_id'=>'plan_F7VBkOHU297sxU'
  ] );
  $response = $this->delete( route( 'subscriptions.cancel', $plan ) );

  $this->assertNotNull( $business->subscription( 'Storage' )->ends_at );
 }
}
