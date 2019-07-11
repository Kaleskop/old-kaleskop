@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'Channels' ) }}</h2>
 </header>

 <div>
  @forelse( $advs as $adv )
   @include( 'website.tile' )

  @empty
   <p>{{ __( 'No advertisements' ) }}</p>

  @endforelse
 </div>

</section>

@endsection
