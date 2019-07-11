@extends( 'layouts.page' )

@section( 'page' )
<section class="py-16 px-6">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'New Plan' ) }}</h2>
 </header>

 @include( 'plans.create-form' )

</section>

@endsection
