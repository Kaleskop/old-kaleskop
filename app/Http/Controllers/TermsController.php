<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller {

 public function __construct() {
  $this->middleware( 'auth' )->only( 'business' );
 }

 // - view actions

 public function general() {
  return view( 'layouts.wrapper', [ 'page'=>'terms.general' ] );
 }

 public function account() {
  return view( 'layouts.wrapper', [ 'page'=>'terms.account' ] );
 }

 public function business() {
  return view( 'layouts.wrapper', [ 'page'=>'terms.business' ] );
 }

 public function kas() {
  return view( 'layouts.wrapper', [ 'page'=>'terms.kas' ] );
 }
}
