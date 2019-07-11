@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'Business' ) }}</h2>
 </header>

 <div>
  <div>
   @include( 'account.business-form' )
  </div>
 </div>

</section>

@endsection
