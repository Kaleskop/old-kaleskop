<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller {

 public function __construct() {
  $this->middleware( 'withBusiness' )->only( 'business' );
 }


 // - view actions

 public function business() {}
}
