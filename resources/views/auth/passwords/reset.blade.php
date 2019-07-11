@extends(  'layouts.layout' )

@section( 'body' )
<section class="sm:w-2/3 md:w-1/2 sm:mx-auto py-16 px-6">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'Reset password' ) }}</h2>
  <p class="font-semibold text-2xl">{{ config( 'app.name' ) }}</p>
 </header>

 @include( 'auth.passwords.reset-form' )

</section>

@endsection
