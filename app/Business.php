<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
  'country', 'name', 'email', 'vat', 'address_line1', 'city', 'cap', 'folder'
 ];


 /**
  * Register methods when booting model
  */
 public static function boot() {
  parent::boot();

  static::creating( function( $model ) {
   $model->folder = (string) Str::orderedUuid();
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
}
