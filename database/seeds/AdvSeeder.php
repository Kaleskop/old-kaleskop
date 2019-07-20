<?php

use Illuminate\Database\Seeder;

use App\Adv;
use App\Business;

class AdvSeeder extends Seeder {

 /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run() {
  $businesses = Business::all();

  foreach( $businesses as $business ) {
   $videos = $business->videos;

   if ( $videos->isNotEmpty() ) {
    foreach( $videos as $video ) {
     factory( Adv::class, rand(0,7) )->create( [ 'business_id'=>$business->id, 'video_id'=>$video->id ] );
    }
   }
  }
 }
}
