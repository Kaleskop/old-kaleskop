<?php

namespace App\Http\Middleware;

use Closure;

class UploadLimitMiddleware {

 /**
  * Handle an incoming request.
  *
  * @param \Illuminate\Http\Request $request
  * @param \Closure $next
  * @return mixed
  */
 public function handle( $request, Closure $next ) {
  if ( $request->user()->business->isOverLimit() ) {

   return redirect()->route( 'business.subscriptions' );
  }

  return $next( $request );
 }
}
