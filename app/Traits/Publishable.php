<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

trait Publishable {

 /**
  * Publish the model
  */
 public function publish() {
  return $this->update( [
   'published_at' => Carbon::now()
  ] );
 }

 /**
  * Unpublish the model
  */
 public function unpublish() {
  return $this->update( [
   'published_at' => null
  ] );
 }


 // - scopes

 /**
  * Get only published models
  */
 public function scopePublished( Builder $query ) {
  return $query->whereNotNull( 'published_at' )->where( 'published_at', '<=', Carbon::now() );
 }

 /**
  * Get only unpublished models
  */
 public function scopeUnpublished( Builder $query ) {
  return $query->whereNull( 'published_at' )->orWhere( 'published_at', '>', Carbon::now() );
 }


 // - checks

 /**
  * Check if model is published
  */
 public function isPublished() {
  if ( is_null( $this->published_at ) ) { return false; }

  return $this->published_at->lte( Carbon::now() );
 }
}
