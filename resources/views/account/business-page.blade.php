@extends( 'layouts.page' )

@section( 'page' )
<section class="py-16 px-6">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'Business' ) }}</h2>
 </header>

 <div>
  <div class="md:w-2/3">
   @include( 'account.business-form' )
  </div>
 </div>

</section>

@endsection
