@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'Videos' ) }}</h2>

  <a href="{{ route( 'videos.create' ) }}">{{ __( 'New Video' ) }}</a>
 </header>

 @include( 'videos.table' )

</section>

@endsection
