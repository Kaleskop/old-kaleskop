<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Storage;
use Carbon\Carbon;

class Business extends Model {

 /**
  * The table associated with the model
  *
  * @var string
  */
 protected $table = 'businesses';

 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
  'country', 'name', 'email', 'vat', 'address_line1', 'city', 'cap', 'folder', 'terms_at'
 ];


 /**
  * Register methods when booting model
  */
 public static function boot() {
  parent::boot();

  static::creating( function( $model ) {
   $model->folder = (string) Str::orderedUuid();
   $model->terms_at = Carbon::now();
  } );

  static::created( function( $model ) {
   // - create folder on storage
   Storage::disk( 's3' )->makeDirectory( $model->folder );
  } );
 }


 // - relations

 /**
  * A business belongs to a user
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function manager() {
  return $this->belongsTo( User::class, 'user_id' );
 }

 /**
  * A business may have many videos
  *
  * @return \Illuminate\Database\Eloquent\Relations\HasMany
  */
 public function videos() {
  return $this->hasMany( Video::class, 'business_id' );
 }


 // - checks

 /**
  * Checks if business is over the limit for uploaded files
  */
 public function isOverLimit() {
  $limit = (1000*1024*1024) * 0.9;
  $amount = $this->videos()->sum( 'size' );

  if ( $amount > $limit ) {
   return true;
  }
  return false;
 }
}
