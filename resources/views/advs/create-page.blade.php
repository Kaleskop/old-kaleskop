@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'New advertisement' ) }}</h2>
 </header>

 @if ( $videos->isNotEmpty() )
  @include( 'advs.create-form' )

  @else
  <p>{{ __( 'You need to' ) }} <a href="{{ route( 'videos.create' ) }}">{{ __( 'upload a video' ) }}</a> {{ __( 'before continue.' ) }}</p>

 @endif

</section>

@endsection
