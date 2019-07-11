<form action="{{ route( 'subscriptions.subscribe' ) }}" method="POST" id="checkout-form">
 @csrf

 <fieldset>
  <legend>{{ __( 'Plans details' ) }}</legend>

  <div>
   @forelse( $plans as $plan )
    <div>
     <input type="radio" name="plan" id="{{ $plan->plan_id }}" value="{{ $plan->plan_id }}" />
     <label for="{{ $plan->plan_id }}">
      <span>{{ $plan->price }}</span>
      <span>{{ $plan->name }}</span>
     </label>
     <div>{{ Illuminate\Mail\Markdown::parse( $plan->description ) }}</div>
    </div>

   @empty
    <p>{{ __( 'No plans' ) }}</p>

   @endforelse
  </div>

  @if ( $errors->has( 'plan' ) )
   <p>{{ $errors->first( 'plan' ) }}</p>
  @endif
 </fieldset>

 <fieldset>
  <legend>{{ __( 'Payment details' ) }}</legend>

  <div>
   <label for="card-element">{{ __( 'Credit or debit card' ) }}</label>
   <div id="card-element"></div>
   <div id="card-errors" role="alert"></div>
   <input type="hidden" name="stripeToken" />
  </div>

  <div>
   <label for="coupon">{{ __( 'Coupon' ) }}</label>
   <input type="text" name="coupon" id="coupon" />

   @if ( $errors->has( 'coupon' ) )
    <p>{{ $errors->first( 'coupon' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit">{{ __( 'Subscribe' ) }}</button>
</form>
