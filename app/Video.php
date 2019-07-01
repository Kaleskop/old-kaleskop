<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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


 // - relations

 /**
  * A video belongs to a business
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function business() {
  return $this->belongsTo( Business::class, 'business_id' );
 }
}
