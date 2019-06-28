@extends( 'layouts.layout' )

@section( 'body' )
<section>
 <header>
  <h2>{{ __( 'Verify Your Email Address' ) }}</h2>
  <p>{{ config( 'app.name' ) }}</p>
 </header>

 @if ( session('resent') )
  <p>{{ __( 'A fresh verification link has been sent to your email address.' ) }}</p>
 @endif

 <p>{{ __( 'Before proceeding, please check your email for a verification link.' ) }}</p>
 <p><a href="{{ route( 'verification.resend' ) }}">{{ __( 'click here to request another email' ) }}</a></p>
</section>

@endsection
