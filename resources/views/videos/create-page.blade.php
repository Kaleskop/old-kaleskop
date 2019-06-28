@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'Upload a new video' ) }}</h2>
 </header>

 @include( 'videos.create-form' )

</section>

@endsection
