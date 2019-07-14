@extends( 'layouts.page' )

@section( 'page' )
<section class="py-16 px-6">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'Business' ) }}</h2>
 </header>

 <div class="md:flex">
  <div class="w-full md:w-2/5 mb-6">
   @include( 'account.business-help' )
  </div>

  <div class="w-full md:w-3/5 mb-6 px-2 md:order-first">
   @include( 'account.business-form' )
  </div>
 </div>

</section>

@endsection
