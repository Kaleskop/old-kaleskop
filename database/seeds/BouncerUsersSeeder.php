<?php

use Illuminate\Database\Seeder;

use Silber\Bouncer\BouncerFacade as Bouncer;
use App\User;

class BouncerUsersSeeder extends Seeder {

 /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run() {
  $god = User::where( 'email', '=', 'info@andreagiuseppe.com' )->first();
  if ( $god ) {
   $god->assign( [ 'god', 'admin', 'moderator' ] );
  }

  $mod1 = User::where( 'email', '=', 'sil.sar90@gmail.com' )->first();
  if ( $mod1 ) {
   $mod1->assign( 'moderator' );
  }
 }
}
