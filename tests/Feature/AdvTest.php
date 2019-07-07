<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Adv;
use App\User;
use App\Business;
use Storage;
use App\Video;

class AdvTest extends TestCase {

 use RefreshDatabase;

 public function test_BusinessUser_CanInsertAnAdvertisement_HasAdv() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->create( [ 'user_id'=>$user->id ] );
  $video = factory( Video::class )->create( [ 'business_id'=>$business->id ] );

  $adv = factory( Adv::class )->make( [ 'video_id'=>$video->id ] );
  $response = $this->post( route( 'advs.store' ), $adv->toArray() );

  $this->assertDatabaseHas( 'advs', [ 'title'=>$adv->title ] );
  $response->assertRedirect( route( 'advs.index' ) );
 }

 public function test_BusinessUser_CanDeleteAnAdvertisement_IsSoftDeleted() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->create( [ 'user_id'=>$user->id ] );
  $adv = factory( Adv::class )->create( [ 'business_id'=>$business->id ] );

  $response = $this->delete( route( 'advs.destroy', $adv ) );

  $this->assertSoftDeleted( 'advs', [ 'id'=>$adv->id ] );
 }

 public function test_Adv_CanBePublished_NotNullPublished() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->create( [ 'user_id'=>$user->id ] );
  $adv = factory( Adv::class )->create();

  $response = $this->post( route( 'advs.publish', $adv ) );

  $this->assertNotNull( Adv::first()->published_at );
 }

 public function test_Adv_CanBeUnPublished_NullPublished() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->create( [ 'user_id'=>$user->id ] );
  $adv = factory( Adv::class )->create();
  $this->post( route( 'advs.publish', $adv ) );

  $response = $this->delete( route( 'advs.unpublish', $adv ) );

  $this->assertNull( Adv::first()->published_at );
 }
}
