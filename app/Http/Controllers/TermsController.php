<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller {

 public function __construct() {
  $this->middleware( 'auth' )->only( 'business' );
 }

 // - view actions

 public function general() {
  return view( 'layouts.wrapper', [ 'page'=>'terms.general' ] )
   ->with( 'title', __( "Terms of Service" ) );
 }

 public function account() {
  return view( 'layouts.wrapper', [ 'page'=>'terms.account' ] )
   ->with( 'title', __( "Account Terms of Service" ) );
 }

 public function business() {
  return view( 'layouts.wrapper', [ 'page'=>'terms.business' ] )
   ->with( 'title', __( "Business Terms of Service" ) );
 }

 public function kas() {
  return view( 'layouts.wrapper', [ 'page'=>'terms.kas' ] );
 }
}
