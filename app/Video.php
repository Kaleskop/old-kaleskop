<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Storage;

class Video extends Model {

 /**
  * The table associated with the model.
  *
  * @var string
  */
 protected $table = 'videos';

 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
  'name', 'type', 'storage', 'path', 'size'
 ];

 /**
  * The accessor to append to model's array
  */
 protected $appends = [ 'storage_url' ];


 // - accessors

 /**
  * Get the storage url attribute
  *
  * @return string
  */
 public function getStorageUrlAttribute() {
  return $this->getStorageUrl();
 }


 // - relations

 /**
  * A video belongs to a business
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function business() {
  return $this->belongsTo( Business::class, 'business_id' );
 }

 /**
  * A video may have many advs
  *
  * @return \Illuminate\Database\Eloquent\Relations\HasMany
  */
 public function advs() {
  return $this->hasMany( Adv::class, 'video_id' );
 }


 // - helpers

 /**
  * Get the storage url
  */
 public function getStorageUrl( $minutes = 5 ) {
  return Storage::disk( $this->storage )->temporaryUrl( $this->path, now()->addMinutes( $minutes ) );
 }
}
