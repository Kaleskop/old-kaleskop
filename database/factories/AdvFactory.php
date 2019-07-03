<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

use App\Adv;
use App\Business;
use App\Video;

$factory->define( Adv::class, function( Faker $faker ) {
 return [
  'business_id' => function() {
   return factory( Business::class )->create()->id;
  },
  'video_id' => function() {
   return factory( Video::class )->create()->id;
  },
  'title'        => $faker->text(95),
  'endpoint'     => $faker->url,
  'clicks'       => $faker->randomNumber,
  'published_at' => null,
 ];
} );
