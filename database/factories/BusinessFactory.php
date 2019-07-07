<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

use App\Business;
use App\User;

$factory->define( Business::class, function( Faker $faker ) {
 return [
  'user_id' => function() {
   return factory( User::class )->create()->id;
  },
  'country'       => $faker->country,
  'name'          => $faker->catchPhrase,
  'email'         => $faker->unique()->companyEmail,
  'vat'           => $faker->unique()->randomNumber,
  'address_line1' => $faker->address,
  'city'          => $faker->city,
  'cap'           => $faker->postcode,
  'folder'        => null,
  'terms_at'      => null,
 ];
} );
