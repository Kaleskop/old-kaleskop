@extends( 'layouts.page' )

@section( 'page' )
<section class="py-16 px-6">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'Edit Plan' ) }}</h2>
  <p class="font-semibold text-2xl">{{ $plan->name }}</p>
 </header>

 @include( 'plans.edit-form' )

</section>

@endsection
