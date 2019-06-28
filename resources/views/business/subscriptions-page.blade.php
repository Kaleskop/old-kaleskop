@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'Subscriptions' ) }}</h2>
 </header>

 @include( 'business.subscription-form' )

</section>

@endsection

@push( 'scripts' )
 <script src="https://js.stripe.com/v3/"></script>
 <script src="{{ asset( 'js/kaleshop.js' ) }}" defer></script>

@endpush
