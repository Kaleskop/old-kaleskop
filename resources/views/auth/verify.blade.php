@extends( 'layouts.layout' )

@section( 'body' )
<section class="sm:w-2/3 md:w-1/2 sm:mx-auto py-16 px-6">
 <header class=mb-6>
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'Verify Your Email Address' ) }}</h2>
  <p class="font-semibold text-2xl">{{ config( 'app.name' ) }}</p>
 </header>

 @if ( session('resent') )
  <p>{{ __( 'A fresh verification link has been sent to your email address.' ) }}</p>
 @endif

 <p class="mb-4">{{ __( 'Before proceeding, please check your email for a verification link.' ) }}</p>
 <p><a href="{{ route( 'verification.resend' ) }}" class="underline">{{ __( 'click here to request another email' ) }}</a></p>
</section>

@endsection
