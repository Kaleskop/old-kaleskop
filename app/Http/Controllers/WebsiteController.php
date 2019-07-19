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
  $advs = Adv::inRandomOrder()->published()->get();

  return view( 'layouts.wrapper', [ 'page'=>'website.channels-page' ] )
   ->with( 'title', __( "Channels" ) )
   ->with( 'advs', $advs );
 }

 public function advs( Adv $adv ) {
  return view( 'layouts.wrapper', [ 'page'=>'website.advs-page' ] )
   ->with( 'title', $adv->title )
   ->with( 'adv', $adv );
 }

 public function pricing() {
  return view( 'website.pricing' )
   ->with( 'title', __( "Pricing" ) );
 }
}
