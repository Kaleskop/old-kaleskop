<?php

namespace App\Http\Middleware;

use Closure;

class WithBusinessMiddleware {

 /**
  * Handle an incoming request.
  *
  * @param \Illuminate\Http\Request $request
  * @param \Closure $next
  * @return mixed
  */
 public function handle( $request, Closure $next ) {
  if ( $request->user()->hasBusiness() ) {

   return redirect()->route( 'business.index' );
  }

  return $next( $request );
 }
}
