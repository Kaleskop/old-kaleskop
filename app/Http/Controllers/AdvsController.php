<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Adv;

class AdvsController extends Controller {

 public function __construct() {
  $this->middleware( 'auth' );
  $this->middleware( 'business' );
 }

 public function store( Request $request ) {
  $this->validate( $request, [
   'video_id' => [ 'required' ],
   'title'    => [ 'required', 'string', 'max:255' ],
   'endpoint' => [ 'required', 'string', 'max:255' ],
  ] );

  $business = $request->user()->business;
  $adv = $business->advs()->create( $request->all() );

  return back();
 }

 public function destroy( Adv $adv ) {
  $adv->delete();

  return back();
 }
}
