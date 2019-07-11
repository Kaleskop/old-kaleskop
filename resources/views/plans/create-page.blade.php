@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'New Plan' ) }}</h2>
 </header>

 @include( 'plans.create-form' )

</section>

@endsection
