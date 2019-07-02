@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'Plans' ) }}</h2>

  <a href="{{ route( 'plans.create' ) }}">{{ __( 'New plan' ) }}</a>
 </header>

 @include( 'plans.table' )

</section>

@endsection
