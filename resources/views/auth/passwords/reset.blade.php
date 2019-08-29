@extends(  'layouts.layout' )

@section( 'body' )
<div class="min-h-screen bg-kaleskop-gold">
 <section class="sm:w-2/3 md:w-1/2 sm:mx-auto py-16 px-6 bg-white">
  <header class="mb-6">
   <h2 class="mb-2 font-medium text-3xl">{{ __( 'Reset password' ) }}</h2>
   <p class="font-semibold text-2xl"><a href="{{ route( 'website.homepage' ) }}">{{ config( 'app.name' ) }}</a></p>
  </header>

  @include( 'auth.passwords.reset-form' )

 </section>
</div>

@endsection
