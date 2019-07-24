<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Adv;
use App\Enums\ModStatus;

class ModerationTest extends TestCase {

 use RefreshDatabase;

 public function test_Model_CanBecomePending_HasPending() {
  $user = factory( User::class )->create();
  $this->actingAs( $user );

  $adv = factory( Adv::class )->create();
  $adv->pend();

  $this->assertDatabaseHas( 'moderations', [
   'model_id'=>$adv->id,
   'model_type'=>ADV::class,
   'status'=>ModStatus::PENDING
  ] );
  $this->assertTrue( $adv->isPending() );
 }

 public function test_Model_CanBecomePostponed_HasPostponed() {
  $user = factory( User::class )->create();
  $this->actingAs( $user );

  $adv = factory( Adv::class )->create();
  $adv->postpone();

  $this->assertDatabaseHas( 'moderations', [
   'model_id'=>$adv->id,
   'model_type'=>ADV::class,
   'status'=>ModStatus::POSTPONED
  ] );
  $this->assertTrue( $adv->isPostponed() );
 }

 public function test_Model_CanBecomeRejected_HasRejected() {
  $user = factory( User::class )->create();
  $this->actingAs( $user );

  $adv = factory( Adv::class )->create();
  $adv->reject();

  $this->assertDatabaseHas( 'moderations', [
   'model_id'=>$adv->id,
   'model_type'=>ADV::class,
   'status'=>ModStatus::REJECTED
  ] );
  $this->assertTrue( $adv->isRejected() );
 }

 public function test_Model_CanBecomeIllegal_HasIllegal() {
  $user = factory( User::class )->create();
  $this->actingAs( $user );

  $adv = factory( Adv::class )->create();
  $adv->illegal();

  $this->assertDatabaseHas( 'moderations', [
   'model_id'=>$adv->id,
   'model_type'=>ADV::class,
   'status'=>ModStatus::ILLEGAL
  ] );
  $this->assertTrue( $adv->isIllegal() );
 }

 public function test_Model_CanBecomeApproved_HasApproved() {
  $user = factory( User::class )->create();
  $this->actingAs( $user );

  $adv = factory( Adv::class )->create();
  $adv->approve();

  $this->assertDatabaseHas( 'moderations', [
   'model_id'=>$adv->id,
   'model_type'=>ADV::class,
   'status'=>ModStatus::APPROVED
  ] );
  $this->assertTrue( $adv->isApproved() );
 }

 // - strict moderation

 public function test_Model_CanBeForcedToBeModeratedOnInsert_HasModeration() {
  $user = factory( User::class )->create();
  $this->actingAs( $user );

  Adv::strictModeration( true );
  $adv = factory( Adv::class )->create();

  $this->assertDatabaseHas( 'moderations', [
   'model_id'=>$adv->id,
   'model_type'=>ADV::class,
   'status'=>ModStatus::PENDING
  ] );
  $this->assertTrue( $adv->isPending() );
 }

 public function test_Model_CanBeForcedToBeModeratedWithCustomStatus_HasModeration() {
  $user = factory( User::class )->create();
  $this->actingAs( $user );

  Adv::strictModeration( true );
  Adv::defaultModeration( ModStatus::REJECTED );
  $adv = factory( Adv::class )->create();

  $this->assertDatabaseHas( 'moderations', [
   'model_id'=>$adv->id,
   'model_type'=>ADV::class,
   'status'=>ModStatus::REJECTED
  ] );
  $this->assertTrue( $adv->isRejected() );
 }
}
