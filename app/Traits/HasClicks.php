<?php

namespace App\Traits;

trait HasClicks {

 /**
  * Update click count on model
  */
 protected function updateClicks( $quantity ) {
  $this->clicks = $quantity;
  $this->save();

  return $this;
 }

 /**
  * Increment click count
  */
 public function incrementClicks( $count = 1 ) {
  $this->updateClicks( $this->clicks + $count );

  return $this;
 }

 /**
  * Decrement click count
  */
 public function decrementClicks( $count = 1 ) {
  $this->updateClicks( max( 0, $this->clicks - $count ) );

  return $this;
 }
}
