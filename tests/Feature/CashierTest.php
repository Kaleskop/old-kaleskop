<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Business;
use App\User;
use Storage;

class CashierTest extends TestCase {

 use RefreshDatabase;

 public function test_AuthUser_BusinessRegistrationCreateStripeCustomer_NotNullStripeId() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->make();
  $this->post( route( 'business.store' ), $business->toArray() );

  $business = Business::where( 'vat', $business->vat )->first();

  $this->assertNotNull( $business->stripe_id );
 }
}
