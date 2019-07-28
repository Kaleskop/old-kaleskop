<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Adv;

class ModerationScopeTest extends TestCase {

 use RefreshDatabase;

 public function test_Model_ModelSelectionIncludesOnlyApproved_OnlyApproved() {
  $num = 5;
  $normal = factory( Adv::class, 3 )->create();
  $advs = factory( Adv::class, $num )->create()->each( function( $adv ) {
   $adv->approve();
  } );

  $items = Adv::approved()->get();

  $this->assertCount( $num, $items );
 }

 public function test_Model_ModelSelectionIncludesOnlyPending_OnlyPending() {
  $num = 5;
  $normal = factory( Adv::class, 3 )->create();
  $advs = factory( Adv::class, $num )->create()->each( function( $adv ) {
   $adv->pend();
  } );

  $items = Adv::pending()->get();

  $this->assertCount( $num, $items );
 }

 public function test_Model_ModelSelectionIncludesOnlyPostponed_OnlyPostponed() {
  $num = 5;
  $normal = factory( Adv::class, 3 )->create();
  $advs = factory( Adv::class, $num )->create()->each( function( $adv ) {
   $adv->postpone();
  } );

  $items = Adv::postponed()->get();

  $this->assertCount( $num, $items );
 }

 public function test_Model_ModelSelectionIncludesOnlyRejected_OnlyRejected() {
  $num = 5;
  $normal = factory( Adv::class, 3 )->create();
  $advs = factory( Adv::class, $num )->create()->each( function( $adv ) {
   $adv->reject();
  } );

  $items = Adv::rejected()->get();

  $this->assertCount( $num, $items );
 }

 public function test_Model_ModelSelectionIncludesOnlyIllegals_OnlyIllegals() {
  $num = 5;
  $normal = factory( Adv::class, 3 )->create();
  $advs = factory( Adv::class, $num )->create()->each( function( $adv ) {
   $adv->illegal();
  } );

  $items = Adv::illegals()->get();

  $this->assertCount( $num, $items );
 }
}
