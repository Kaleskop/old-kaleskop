<form action="{{ route( 'subscriptions.subscribe' ) }}" method="POST" id="checkout-form">
 @csrf

 <fieldset class="mb-8 p-4 border border-transparent">
  <legend class="p-2 font-light italic">{{ __( 'Plans details' ) }}</legend>

  <div class="flex flex-col md:flex-wrap md:flex-row">
   @forelse( $plans as $plan )
    <div class="relative w-full mb-8 md:mx-4 px-4 pt-5 pb-4 flex flex-col md:flex-1 border border-transparent rounded text-center">
     <input type="radio" name="plan" id="{{ $plan->plan_id }}" class="hidden" value="{{ $plan->plan_id }}" />
     <label for="{{ $plan->plan_id }}" class="cursor-pointer mb-2 py-6">
      <span class="leading-none font-semibold text-5xl">{{ $plan->price }}</span>
      <span class="font-bold uppercase">{{ $plan->name }}</span>
     </label>
     <div class="leading-relaxed text-sm">{{ Illuminate\Mail\Markdown::parse( $plan->description ) }}</div>
    </div>

   @empty
    <p>{{ __( 'No plans' ) }}</p>

   @endforelse
  </div>

  @if ( $errors->has( 'plan' ) )
   <p>{{ $errors->first( 'plan' ) }}</p>
  @endif
 </fieldset>

 <fieldset class="mb-8 p-4 border border-transparent">
  <legend class="p-2 font-light italic">{{ __( 'Payment details' ) }}</legend>

  <div class="mb-4">
   <label for="card-element">{{ __( 'Credit or debit card' ) }}</label>
   <div id="card-element"></div>
   <div id="card-errors" role="alert"></div>
   <input type="hidden" name="stripeToken" />
  </div>

  <div>
   <label for="coupon" class="block mb-2 font-bold">{{ __( 'Coupon' ) }}</label>
   <input type="text" name="coupon" id="coupon" class="appearance-none w-full py-2 px-4 rounded border-2 border-transparent leading-tight" />

   @if ( $errors->has( 'coupon' ) )
    <p>{{ $errors->first( 'coupon' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center">{{ __( 'Subscribe' ) }}</button>
</form>
