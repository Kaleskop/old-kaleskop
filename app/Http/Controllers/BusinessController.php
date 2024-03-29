<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Business;
use Auth;
use App\Plan;

class BusinessController extends Controller {

 public function __construct() {
  $this->middleware( 'auth' );
  $this->middleware( 'verified' );
  $this->middleware( 'business' )->except( 'store' );
 }

 public function store( Request $request ) {
  $this->validate( $request, [
   'country'       => [ 'required', 'string', 'max:255' ],
   'name'          => [ 'required', 'string', 'max:255' ],
   'email'         => [ 'required', 'email', 'unique:businesses,email' ],
   'vat'           => [ 'required', 'max:15', 'unique:businesses,vat' ],
   'address_line1' => [ 'required', 'string', 'max:255' ],
   'city'          => [ 'required', 'string', 'max:255' ],
   'cap'           => [ 'required', 'string', 'max:11' ],
   'sdi'           => [ 'nullable', 'alpha_num', 'max:7' ],
   'terms'         => [ 'accepted' ],
  ] );

  $user = $request->user();
  $business = $user->business()->create( $request->all() );

  // assign business role
  $user->assign( 'business' );

  return redirect()->route( 'business.index' );
 }


 // - view actions

 public function index() {
  $business = Auth::user()->business;

  return view( 'layouts.wrapper', [ 'page'=>'business.index-page' ] )
   ->with( 'business', $business );
 }

 public function subscriptions() {
  $business = Auth::user()->business;
  $plans = Plan::latest()->get();

  return view( 'layouts.wrapper', [ 'page'=>'business.subscriptions-page' ] )
   ->with( 'business', $business )
   ->with( 'plans', $plans );
 }
}
