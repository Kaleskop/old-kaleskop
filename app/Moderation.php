<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Moderation extends Model {

 use SoftDeletes;

 /**
  * The table associated with the model
  *
  * @var string
  */
 protected $table = 'moderations';

 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [ 'user_id', 'status' ];


 // - relations

 /**
  * Fetch the associated model for the moderation
  *
  * @return \Illuminate\Database\Eloquent\Relations\MorphTo
  */
 public function model() {
  return $this->morphTo( 'model' );
 }

 /**
  * Each moderation belongs to a moderator
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function moderator() {
  return $this->belongsTo( User::class, 'user_id' );
 }
}
