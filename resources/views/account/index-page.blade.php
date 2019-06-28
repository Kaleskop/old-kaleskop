@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'Hi, :username', [ 'username'=>$user->name ] ) }}</h2>
 </header>

 @include( 'account.verified-email-message' )

 @include( 'auth.logout-form' )

</section>

@endsection
