<?php

namespace App\Http\Middleware;

use Closure;

use Silber\Bouncer\BouncerFacade as Bouncer;

class CheckRoleMiddleware {

 /**
  * Handle an incoming request.
  *
  * @param \Illuminate\Http\Request $request
  * @param \Closure $next
  * @return mixed
  */
 public function handle( $request, Closure $next, $role ) {
  if ( !$request->user()->isA( $role ) ) {

   return abort(404);
  }

  return $next( $request );
 }
}
