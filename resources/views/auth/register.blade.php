@extends( 'layouts.layout' )

@section( 'body' )
<div class="min-h-screen bg-yellow-600">
 <section class="sm:w-2/3 md:w-1/2 sm:mx-auto py-16 px-6 bg-white">
  <header class="mb-6">
   <h2 class="mb-2 font-medium text-3xl">{{ __( 'New Account' ) }}</h2>
   <p class="font-semibold text-2xl"><a href="{{ route( 'website.homepage' ) }}">{{ config( 'app.name' ) }}</a></p>
  </header>

  <p class="mb-4">{{ __( 'Already have an account? Please,' ) }} <a href="{{ route( 'login' ) }}" class="underline">{{ __( 'sign in' ) }}</a></p>

  @include( 'auth.register-form' )

 </section>
</div>

@endsection
