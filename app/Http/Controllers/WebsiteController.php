<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller {


 // - view actions

 public function homepage() {
  return view( 'website.homepage' );
 }
}
