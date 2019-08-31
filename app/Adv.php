<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\HasClicks;
use App\Traits\Publishable;

class Adv extends Model {

 use SoftDeletes, HasClicks, Publishable;

 /**
  * The table associated with the model.
  *
  * @var string
  */
 protected $table = 'advs';

 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [ 'video_id', 'title', 'endpoint', 'cover_path', 'clicks', 'published_at' ];

 /**
  * The attributes that should be cast to native types.
  *
  * @var array
  */
 protected $casts = [ 'published_at' => 'datetime' ];

 /**
  * The relationships that should always be loaded.
  *
  * @var array
  */
 protected $with = [ 'video' ];

 /**
  * Register methods when booting model
  */
 public static function boot() {
  parent::boot();

  static::creating( function( $model ) {
   $model->clicks = 0;
  } );
 }


 // - relations

 /**
  * An adv belongs to a business
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function owner() {
  return $this->belongsTo( Business::class, 'business_id' );
 }

 /**
  * An adv belongs to a video
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function video() {
  return $this->belongsTo( Video::class, 'video_id' );
 }

    // - helpers

    /**
     * Get the business folder path
     */
    public function getFolderPath(...$path): string
    {
        return "{$this->owner->folder}/".implode(DIRECTORY_SEPARATOR, $path);
    }
}
