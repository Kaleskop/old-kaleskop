<?php

use Illuminate\Database\Seeder;

use App\Business;
use App\User;

class BusinessSeeder extends Seeder {

 /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run() {
  $users = User::inRandomOrder()->get();
  $x = rand( 1, $users->count() );

  for( $a=0; $a<$x; $a++ ) {
   factory( Business::class )->create( [ 'user_id'=>$users->shift()->id ] );
  }
 }
}
