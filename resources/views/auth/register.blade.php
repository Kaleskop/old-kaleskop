@extends( 'layouts.layout' )

@section( 'body' )
<section>
 <header>
  <h2>{{ __( 'New Account' ) }}</h2>
  <p>{{ config( 'app.name' ) }}</p>
 </header>

 <p>{{ __( 'Already have an account? Please,' ) }} <a href="{{ route( 'login' ) }}">{{ __( 'sign in' ) }}</a></p>

 @include( 'auth.register-form' )

</section>

@endsection
