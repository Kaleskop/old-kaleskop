<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Plan;

class PlansController extends Controller {

 public function store( Request $request ) {
  $this->validate( $request, [
   'name'         => [ 'required', 'string', 'max:255', 'unique:plans' ],
   'description'  => [ 'required', 'string' ],
   'price'        => [ 'required', 'numeric' ],
   'product_id'   => [ 'required', 'string' ],
   'product_name' => [ 'required', 'string' ],
   'plan_id'      => [ 'required', 'string' ],
  ] );

  $plan = Plan::create( $request->all() );

  return redirect()->route( 'plans.index' );
 }

 public function update( Request $request, Plan $plan ) {
  $this->validate( $request, [
   'name'        => [
    'required', 'string', 'max:255',
    Rule::unique( 'plans' )->ignore( $plan->id )
   ],
   'description'  => [ 'required', 'string' ],
   'price'        => [ 'required', 'numeric' ],
   'product_id'   => [ 'required', 'string' ],
   'product_name' => [ 'required', 'string' ],
   'plan_id'      => [ 'required', 'string' ],
  ] );

  $plan->update( $request->all() );

  return redirect()->route( 'plans.index' );
 }

 public function destroy( Plan $plan ) {
  $plan->delete();

  return back();
 }
}
