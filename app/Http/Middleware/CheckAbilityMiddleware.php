<?php

namespace App\Http\Middleware;

use Closure;

use Silber\Bouncer\BouncerFacade as Bouncer;

class CheckAbilityMiddleware {

 /**
  * Handle an incoming request.
  *
  * @param \Illuminate\Http\Request $request
  * @param \Closure $next
  * @return mixed
  */
 public function handle( $request, Closure $next, $ability, $subject = null ) {
  if ( !$request->user()->can( $ability, $subject ) ) {

   return abort(404);
  }

  return $next( $request );
 }
}
