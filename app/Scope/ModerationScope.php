<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ModerationScope implements Scope {

 /**
  * All of the extensions to be added to the builder.
  *
  * @var array
  */
 protected $extensions = [ 'approved', 'pending', 'postponed', 'rejected', 'illegals' ];


 /**
  * Apply the scope to a given Eloquent query builder.
  *
  * @param  \Illuminate\Database\Eloquent\Builder  $builder
  * @param  \Illuminate\Database\Eloquent\Model  $model
  * @return void
  */
 public function apply( Builder $builder, Model $model ) {}

 /**
  * Extend the query builder with the needed functions.
  *
  * @param  \Illuminate\Database\Eloquent\Builder  $builder
  * @return void
  */
 public function extend( Builder $builder ) {
  foreach( $this->extensions as $extension ) {
   $this->{"add{$extension}"}( $builder );
  }
 }
}
