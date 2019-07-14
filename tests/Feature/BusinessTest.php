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
  $business = factory( Business::class )->make( [ 'terms'=>'true' ] );

  $response = $this->post( route( 'business.store' ), $business->toArray() );

  $this->assertDatabaseHas( 'businesses', [ 'vat'=>$business->vat ] );
  $response->assertRedirect( route( 'business.index' ) );
 }

 public function test_BusinessUser_CannotRegisterOtherBusiness_RedirectTo() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->make( [ 'terms'=>'true' ] );
  $this->post( route( 'business.store' ), $business->toArray() );

  $response = $this->get( route( 'account.business' ) );

  $response->assertRedirect( route( 'business.index' ) );
 }

 public function test_Business_RegistrationAssignUUID_DatabaseHasFolder() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->make( [ 'terms'=>'true' ] );
  $this->post( route( 'business.store' ), $business->toArray() );

  $model = Business::where( 'vat', $business->vat )->first();

  $this->assertDatabaseHas( 'businesses', [ 'id'=>$model->id, 'folder'=>$model->folder ] );
  Storage::disk( 's3' )->assertExists( $model->folder );
 }

 public function test_Business_CanRegisterABusinessWithSDI_DatabaseHasBusiness() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->make( [ 'sdi'=>'0000000', 'terms'=>'true' ] );

  $response = $this->post( route( 'business.store' ), $business->toArray() );

  $this->assertDatabaseHas( 'businesses', [ 'vat'=>$business->vat, 'sdi'=>$business->sdi ] );
 }
}
