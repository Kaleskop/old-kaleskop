@extends( 'layouts.page' )

@section( 'page' )
<section class="py-16 px-6">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'Advertisements' ) }}</h2>

  <a href="{{ route( 'advs.create' ) }}" class="underline">{{ __( 'New advertisement' ) }}</a>
 </header>

 <div class="flex flex-col">
  @forelse( $advs as $adv )
   @include( 'advs.tile' )

  @empty
   <p>{{ __( 'No advertisement' ) }}</p>

  @endforelse
 </div>
</section>

@endsection
