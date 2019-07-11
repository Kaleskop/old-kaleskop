@extends(  'layouts.layout' )

@section( 'body' )
<section>
 <header>
  <h2>{{ __( 'Sign in' ) }}</h2>
  <p>{{ config( 'app.name' ) }}</p>
 </header>

 <p>{{ __( "Don't have a account?" ) }} <a href="{{ route( 'register' ) }}">{{ __( 'Create One' ) }}</a></p>

 @include( 'auth.login-form' )

 <p><a href="{{ route( 'password.request' ) }}">{{ __( 'Forgot Password?' ) }}</a></p>
</section>

@endsection
