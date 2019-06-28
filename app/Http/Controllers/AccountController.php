<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller {

 public function __construct() {
  $this->middleware( 'withBusiness' )->only( 'business' );
 }


 // - view actions

 public function index() {
  $user = Auth::user();

  return view( 'layouts.wrapper', [ 'page'=>'account.index-page' ] )
   ->with( 'user', $user );
 }

 public function business() {
  $countries = Lang::get( 'countries.UE' );
  $user = Auth::user();

  return view( 'layouts.wrapper', [ 'page'=>'account.business-page' ] )
  ->with( 'countries', $countries )
  ->with( 'user', $user );
 }
}
