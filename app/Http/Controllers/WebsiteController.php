<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Adv;

class WebsiteController extends Controller {

 public function endpoint( Adv $adv ) {
  $adv = $adv->incrementClicks();

  return redirect( $adv->endpoint );
 }


 // - view actions

 public function homepage() {
  return view( 'website.homepage' );
 }

 public function channels() {
  $advs = Adv::inRandomOrder()->get();

  return view( 'layouts.wrapper', [ 'page'=>'website.channels-page' ] )
   ->with( 'advs', $advs );
 }

 public function advs( Adv $adv ) {
  return view( 'layouts.wrapper', [ 'page'=>'website.advs-page' ] )
   ->with( 'adv', $adv );
 }
}
