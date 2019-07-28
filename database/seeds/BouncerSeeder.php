<?php

use Illuminate\Database\Seeder;

use Silber\Bouncer\BouncerFacade as Bouncer;
use App\Business;
use App\Video;
use App\Adv;
use App\Plan;
use App\Moderation;

class BouncerSeeder extends Seeder {

 /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run() {
  $god = Bouncer::role()->firstOrCreate( [ 'name'=>'god', 'title'=>'God' ] );
  $admin = Bouncer::role()->firstOrCreate( [ 'name'=>'admin', 'title'=>'Admin' ] );
  $moderator = Bouncer::role()->firstOrCreate( [ 'name'=>'moderator', 'title'=>'Moderator' ] );
  $business = Bouncer::role()->firstOrCreate( [ 'name'=>'business', 'title'=>'Business' ] );

  Bouncer::allow( $god )->everything();

  Bouncer::allow( $admin )->toManage( Business::class );
  Bouncer::allow( $admin )->toManage( Plan::class );

  Bouncer::allow( $moderator )->toManage( Moderation::class );

  Bouncer::allow( $business )->toOwn( Business::class );
  Bouncer::allow( $business )->toOwn( Video::class );
  Bouncer::allow( $business )->toOwn( Adv::class );
 }
}
