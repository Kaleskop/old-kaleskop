<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model {

 /**
  * The table associated with the model.
  *
  * @var string
  */
 protected $table = 'plans';

 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
  'name', 'description', 'price', 'product_id', 'product_name', 'plan_id'
 ];

 /**
  * The attributes that should be cast to native types.
  *
  * @var array
  */
 protected $casts = [ 'price' => 'decimal:2' ];

}
