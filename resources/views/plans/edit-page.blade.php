@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'Edit Plan' ) }}</h2>
  <p>{{ $plan->name }}</p>
 </header>

 @include( 'plans.edit-form' )

</section>

@endsection
