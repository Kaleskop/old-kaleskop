<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Enums\ModStatus;

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


 // - extensions

 protected function addApproved( Builder $builder ) {
  $builder->macro( 'approved', function( Builder $builder ) {
   $model = $builder->getModel();
   $qualifiedKey = $model->qualifyColumn( $model->getKeyName() );

   $builder->join( 'moderations', 'moderations.model_id', '=', $qualifiedKey )
    ->where( 'moderations.model_type', '=', get_class( $model ) )
    ->where( 'moderations.status', '=', ModStatus::APPROVED )
    ->whereNull( 'moderations.deleted_at' );

   return $builder;
  } );
 }

 protected function addPending( Builder $builder ) {
  $builder->macro( 'pending', function( Builder $builder ) {
   $model = $builder->getModel();
   $qualifiedKey = $model->qualifyColumn( $model->getKeyName() );

   $builder->join( 'moderations', 'moderations.model_id', '=', $qualifiedKey )
    ->where( 'moderations.model_type', '=', get_class( $model ) )
    ->where( 'moderations.status', '=', ModStatus::PENDING )
    ->whereNull( 'moderations.deleted_at' );

   return $builder;
  } );
 }

 protected function addPostponed( Builder $builder ) {
  $builder->macro( 'postponed', function( Builder $builder ) {
   $model = $builder->getModel();
   $qualifiedKey = $model->qualifyColumn( $model->getKeyName() );

   $builder->join( 'moderations', 'moderations.model_id', '=', $qualifiedKey )
    ->where( 'moderations.model_type', '=', get_class( $model ) )
    ->where( 'moderations.status', '=', ModStatus::POSTPONED )
    ->whereNull( 'moderations.deleted_at' );

   return $builder;
  } );
 }

 protected function addRejected( Builder $builder ) {
  $builder->macro( 'rejected', function( Builder $builder ) {
   $model = $builder->getModel();
   $qualifiedKey = $model->qualifyColumn( $model->getKeyName() );

   $builder->join( 'moderations', 'moderations.model_id', '=', $qualifiedKey )
    ->where( 'moderations.model_type', '=', get_class( $model ) )
    ->where( 'moderations.status', '=', ModStatus::REJECTED )
    ->whereNull( 'moderations.deleted_at' );

   return $builder;
  } );
 }

 protected function addIllegals( Builder $builder ) {
  $builder->macro( 'illegals', function( Builder $builder ) {
   $model = $builder->getModel();
   $qualifiedKey = $model->qualifyColumn( $model->getKeyName() );

   $builder->join( 'moderations', 'moderations.model_id', '=', $qualifiedKey )
    ->where( 'moderations.model_type', '=', get_class( $model ) )
    ->where( 'moderations.status', '=', ModStatus::ILLEGAL )
    ->whereNull( 'moderations.deleted_at' );

   return $builder;
  } );
 }
}
