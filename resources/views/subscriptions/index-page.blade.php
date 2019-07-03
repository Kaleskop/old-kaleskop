@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'Subscriptions' ) }}</h2>
 </header>

 @include( 'subscriptions.tile' )

</section>

@endsection
