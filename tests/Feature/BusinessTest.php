<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Business;
use App\User;
use Storage;

class BusinessTest extends TestCase {

 use RefreshDatabase;

 public function test_AuthUser_CanRegisterABusiness_DatabaseHasBusiness() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->make();

  $response = $this->post( route( 'business.store' ), $business->toArray() );

  $this->assertDatabaseHas( 'businesses', [ 'vat'=>$business->vat ] );
  $response->assertRedirect( route( 'business.index' ) );
 }

 public function test_Business_RegistrationAssignUUID_DatabaseHasFolder() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->make();
  $this->post( route( 'business.store' ), $business->toArray() );

  $model = Business::where( 'vat', $business->vat )->first();

  $this->assertDatabaseHas( 'businesses', [ 'id'=>$model->id, 'folder'=>$model->folder ] );
 }
}
