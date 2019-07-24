<?php

use Illuminate\Database\Seeder;

use App\Video;
use App\Business;

class VideoSeeder extends Seeder {

 /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run() {
  $businesses = Business::all();

  foreach( $businesses as $business ) {
   factory( Video::class, rand(0,4) )->create( [ 'business_id'=>$business->id ] );
  }
 }
}
