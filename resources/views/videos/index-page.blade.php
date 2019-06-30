@extends( 'layouts.page' )

@section( 'page' )
<section class="py-16 px-6">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'Videos' ) }}</h2>

  <a href="{{ route( 'videos.create' ) }}" class="underline">{{ __( 'New Video' ) }}</a>
 </header>

 @include( 'videos.table' )

</section>

@endsection
