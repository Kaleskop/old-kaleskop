@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'Channels' ) }}</h2>
 </header>

 <div class="px-6 flex flex-col">
  @forelse( $advs as $adv )
   @include( 'website.tile' )

  @empty
   <p>{{ __( 'No advertisements' ) }}</p>

  @endforelse
 </div>

</section>

@endsection
