<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Plan;
use App\User;

class PlanTest extends TestCase {

 use RefreshDatabase;

 public function test_AuthUser_CanInsertAPlan_HasPlan() {
  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $plan = factory( Plan::class )->make();

  $response = $this->post( route( 'plans.store' ), $plan->toArray() );

  $this->assertDatabaseHas( 'plans', [ 'name'=>$plan->name ] );
  $response->assertRedirect( route( 'plans.index' ) );
 }

 public function test_AuthUser_CanEditAPlan_HasPlan() {
  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $plan = factory( Plan::class )->create();

  $data = $plan->toArray();
  $data['name'] = 'enterprise';
  $response = $this->patch( route( 'plans.update', $plan ), $data );

  $this->assertDatabaseHas( 'plans', [ 'name'=>$data['name'] ] );
  $response->assertRedirect( route( 'plans.index' ) );
 }

 public function test_AuthUser_CanDeleteSubscriptionPlan_MissingPlan() {
  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $plan = factory( Plan::class )->create();

  $response = $this->delete( route( 'plans.destroy', $plan ) );

  $this->assertDatabaseMissing( 'plans', [ 'id'=>$plan->id ] );
 }
}
