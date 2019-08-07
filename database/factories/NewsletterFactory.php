<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Newsletter;

$factory->define( Newsletter::class, function( Faker $faker ) {
 return [
  'email' => $faker->safeEmail,
 ];
} );
