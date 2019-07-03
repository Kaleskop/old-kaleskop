<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Adv;
use Auth;

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

  return redirect()->route( 'advs.index' );
 }

 public function destroy( Adv $adv ) {
  $adv->delete();

  return back();
 }


 // - view actions

 public function index() {
  $advs = Auth::user()->business->advs;

  return view( 'layouts.wrapper', [ 'page'=>'advs.index-page' ] )
   ->with( 'advs', $advs );
 }

 public function create() {
  $videos = Auth::user()->business->videos;

  return view( 'layouts.wrapper', [ 'page'=>'advs.create-page' ] )
   ->with( 'videos', $videos );
 }
}
