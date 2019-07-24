<?php

namespace App\Traits;

use App\Moderation;
use App\Enums\ModStatus;
use Auth;

trait Moderate {

 /**
  * Add a new moderation for the model
  */
 public function moderate( $status ) {
  // if model has a moderation
  if ( $this->moderations()->exists() ) {
   // mark it as soft deleted
   $this->lastModeration()->delete();
  }

  $data = [ 'user_id'=>Auth::id(), 'status'=>$status ];
  $this->moderations()->create( $data );
 }


 // - helpers methods

 /**
  * Add a pending moderation
  */
 public function pend() {
  $this->moderate( ModStatus::PENDING );
 }

 /**
  * Add a postponed moderation
  */
 public function postpone() {
  $this->moderate( ModStatus::POSTPONED );
 }

 /**
  * Add a rejected moderation
  */
 public function reject() {
  $this->moderate( ModStatus::REJECTED );
 }

 /**
  * Add an illegal moderation
  */
 public function illegal() {
  $this->moderate( ModStatus::ILLEGAL );
 }

 /**
  * Add an approved moderation
  */
 public function approve() {
  $this->moderate( ModStatus::APPROVED );
 }


 // - relations

 /**
  * Get the last moderation for the current model
  */
 public function lastModeration( $columns = [ '*' ] ) {
  return $this->moderations()->get( $columns )->last();
 }

 /**
  * A model may have many moderations
  *
  * @return \Illuminate\Database\Eloquent\Relations\MorphMany
  */
 public function moderations() {
  return $this->morphMany( Moderation::class, 'model' );
 }


 // - check model status

 /**
  * Check if model is in pending state
  */
 public function isPending() {
  return $this->lastModeration( 'status' )->status === ModStatus::PENDING;
 }

 /**
  * Check if model is in postponed state
  */
 public function isPostponed() {
  return $this->lastModeration( 'status' )->status === ModStatus::POSTPONED;
 }

 /**
  * Check if model is in rejected state
  */
 public function isRejected() {
  return $this->lastModeration( 'status' )->status === ModStatus::REJECTED;
 }

 /**
  * Check if model is in illegal state
  */
 public function isIllegal() {
  return $this->lastModeration( 'status' )->status === ModStatus::ILLEGAL;
 }

 /**
  * Check if model is in approved state
  */
 public function isApproved() {
  return $this->lastModeration( 'status' )->status === ModStatus::APPROVED;
 }
}
