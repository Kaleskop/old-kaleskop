<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Newsletter;

class NewslettersController extends Controller {

 public function subscribe( Request $request ) {
  $this->validate( $request, [
   'email' => [ 'required', 'string', 'email', 'max:255', 'unique:newsletters' ],
  ] );

  $newsletter = Newsletter::create( $request->all() );

  return back();
 }
}
