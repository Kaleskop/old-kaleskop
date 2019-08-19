@extends( 'layouts.page' )

@section( 'page' )
<section class="py-16 px-6">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'New advertisement' ) }}</h2>
 </header>

 <p class="mb-4">{{ __( 'Advertising is the main content of ' ) }} <span class="font-brand font-semibold">{{ config( 'app.name' ) }}</span></p>

 @if ( $videos->isNotEmpty() )
  @include( 'advs.create-form' )

  @else
  <p>{{ __( 'You need to' ) }} <a href="{{ route( 'videos.create' ) }}" class="underline">{{ __( 'upload a video' ) }}</a> {{ __( 'before continue.' ) }}</p>

 @endif

</section>

@endsection
