<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Plan;

$factory->define( Plan::class, function( Faker $faker ) {
 return [
  'name'         => $faker->firstName,
  'description'  => $faker->text(300),
  'price'        => $faker->randomFloat(2, 0, 50),
  'product_id'   => Str::slug( $faker->secondaryAddress, '_' ),
  'product_name' => $faker->name,
  'plan_id'      => Str::slug( $faker->secondaryAddress, '_' )
 ];
} );
