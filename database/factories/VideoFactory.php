<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

use App\Video;
use App\Business;

$factory->define( Video::class, function( Faker $faker ) {
 return [
  'business_id' => function() {
   return factory( Business::class )->create()->id;
  },
  'name' => $faker->firstName,
  'type' => 'video/mp4',
  'storage' => 's3',
  'path' => $faker->url,
  'size' => rand(1,20000),
 ];
} );
