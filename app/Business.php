<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Storage;
use Laravel\Cashier\Billable;
use Carbon\Carbon;

class Business extends Model {

 use Notifiable, Billable;

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
  'country', 'name', 'email', 'vat', 'address_line1', 'city', 'cap', 'sdi', 'folder', 'terms_at'
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
   // - create the stripe customer before any possible error
   $model->createStripeCustomer();

   // - create folder on storage
   Storage::disk( 's3' )->makeDirectory( $model->folder );
  } );
 }

 /**
  * Specify the tax percentage business pays on a subscription
  */
 public function taxPercentage() {
  return 22;
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

 /**
  * A business may have many advs
  *
  * @return \Illuminate\Database\Eloquent\Relations\HasMany
  */
 public function advs() {
  return $this->hasMany( Adv::class, 'business_id' );
 }


 // - checks

 /**
  * Checks if business is over the limit for uploaded files
  */
 public function isOverLimit() {
  $limit = (500*1024*1024) * 0.95;
  $amount = $this->videos()->sum( 'size' );

  if ( $amount > $limit ) {
   return true;
  }
  return false;
 }


 // - helpers

 /**
  * Create the stripe customer for this model
  */
 public function createStripeCustomer() {
  $customer = [
   'email'=>$this->email,
   'shipping'=>[
    'address'=>[
     'country'=>$this->country,
     'line1'=>$this->address_line1,
     'city'=>$this->city,
     'postal_code'=>$this->cap
    ],
    'name'=>$this->name
   ],
   'tax_info'=>[
    'tax_id'=>$this->vat,
    'type'=>'vat'
   ],
   'metadata'=>[
    'sdi'=>$this->sdi ?? '-'
   ]
  ];
  $this->createAsStripeCustomer( $customer );
 }
}
