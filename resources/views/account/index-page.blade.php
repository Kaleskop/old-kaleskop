@extends( 'layouts.page' )

@section( 'page' )
<section class="py-16 px-6">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'Hi, :username', [ 'username'=>$user->name ] ) }}</h2>
 </header>

 @include( 'account.verified-email-message' )

 @include( 'account.advertising-message' )

 @include( 'auth.logout-form' )

</section>

@endsection
