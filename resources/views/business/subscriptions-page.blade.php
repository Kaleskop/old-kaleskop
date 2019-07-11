@extends( 'layouts.page' )

@section( 'page' )
<section class="py-16 px-6">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'Subscriptions' ) }}</h2>
 </header>

 @include( 'business.subscription-form' )

</section>

@endsection

@push( 'scripts' )
 <script src="https://js.stripe.com/v3/"></script>
 <script src="{{ asset( 'js/kaleshop.js' ) }}" defer></script>

@endpush
